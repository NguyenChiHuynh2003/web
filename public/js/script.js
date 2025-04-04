async function uploadImageBoth() {
    const fileInput = document.getElementById('upload');
    if (!fileInput.files.length) {
      return;
    }
  
    const file = fileInput.files[0];
  
    // Hiển thị ảnh xem trước
    const reader = new FileReader();
    reader.onload = function(e) {
      const imgElement = document.getElementById('coin-image');
      imgElement.src = e.target.result;
      imgElement.classList.remove('hidden');
    };
    reader.readAsDataURL(file);
  
    // Chuẩn bị dữ liệu cho API nhận diện truyền thống
    const formDataTraditional = new FormData();
    formDataTraditional.append("image", file);
  
    try {
      // Gọi API nhận diện truyền thống
      const responseTraditional = await fetch("http://127.0.0.1:5000/recognize", {
        method: "POST",
        body: formDataTraditional
      });
      const dataTraditional = await responseTraditional.json();
  
      let resultText = "";
      const threshold = 90; // ngưỡng độ chính xác
  
      // Kiểm tra dữ liệu truyền thống và ngưỡng độ chính xác
      if (
        dataTraditional.error ||
        !dataTraditional.coin_info ||
        isNaN(dataTraditional.confidence) ||
        dataTraditional.confidence < threshold
      ) {
        // Chuẩn bị dữ liệu cho API OpenAI
        const formDataAI = new FormData();
        formDataAI.append("file", file);
  
        const responseAI = await fetch("http://127.0.0.1:5000/detect-coin-ai", {
          method: "POST",
          body: formDataAI
        });
        const dataAI = await responseAI.json();
        resultText = (dataAI.error ? dataAI.error : dataAI.result);
      } else {
        const traditionalCoin = `${dataTraditional.coin_info.TENXU} ${dataTraditional.coin_info.TENQG}`;
        resultText = `${traditionalCoin} (độ chính xác ${dataTraditional.confidence}%)`;
      }
  
      document.getElementById("info").innerText = resultText;
  
      // Tạo câu hỏi tự động từ kết quả nhận diện
      const question = `Thông tin của ${resultText}`;
  
      // Gửi câu hỏi đến chatbot
      askChatbot(question);
  
    } catch (error) {
      document.getElementById("info").innerText = "Lỗi kết nối đến API!";
    }
  }
  
  async function askChatbot(question) {
    const chatAnswerElement = document.getElementById("chat-answer");
  
    // Kiểm tra câu hỏi có trống không
    if (!question) {
      alert("Vui lòng tải ảnh để nhận diện tiền xu trước!");
      return;
    }
  
    try {
      // Gửi câu hỏi đến API Chatbot (Flask)
      const response = await fetch("http://127.0.0.1:5001/ask", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ question })
      });
      const data = await response.json();
  
      // Hiển thị câu trả lời từ chatbot
      const answer = data.answer || "Chatbot không trả lời được câu hỏi.";
      chatAnswerElement.innerText = answer;
  
    } catch (error) {
      console.error("Lỗi khi gọi API Chatbot:", error);
      chatAnswerElement.innerText = "Lỗi kết nối tới chatbot.";
    }
  }
  
  let webcamStream = null;
  
  // Mở webcam
  document.getElementById("open-webcam").addEventListener("click", async function () {
    const videoElement = document.getElementById("webcam");
    const captureButton = document.getElementById("capture");
    const imgElement = document.getElementById("coin-image");
  
    try {
      webcamStream = await navigator.mediaDevices.getUserMedia({ video: true });
      videoElement.srcObject = webcamStream;
      videoElement.classList.remove("hidden");
      imgElement.classList.add("hidden");
      captureButton.classList.remove("hidden");
    } catch (error) {
      alert("Không thể mở webcam!");
    }
  });
  
  // Chụp ảnh từ webcam
  document.getElementById("capture").addEventListener("click", function () {
    const videoElement = document.getElementById("webcam");
    const imgElement = document.getElementById("coin-image");
    const canvas = document.createElement("canvas");
    canvas.width = videoElement.videoWidth;
    canvas.height = videoElement.videoHeight;
    const ctx = canvas.getContext("2d");
  
    ctx.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
    const imageData = canvas.toDataURL("image/png");
  
    imgElement.src = imageData;
    imgElement.classList.remove("hidden");
    videoElement.classList.add("hidden");
  
    stopWebcam(); // Tắt webcam ngay sau khi chụp
  
    sendCapturedImage(imageData);
  });
  
  // Tắt webcam sau khi chụp
  function stopWebcam() {
    if (webcamStream) {
      webcamStream.getTracks().forEach(track => track.stop());
    }
    document.getElementById("capture").classList.add("hidden");
  }
  
  // Gửi ảnh chụp đến API nhận diện
  async function sendCapturedImage(base64Image) {
    try {
      const response = await fetch("http://127.0.0.1:5000/recognize", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ image: base64Image })
      });
      const data = await response.json();
  
      let resultText = data.result || "Không nhận diện được.";
      document.getElementById("info").innerText = resultText;
  
      // Nếu không nhận diện được, hiển thị "Không có thông tin"
      if (resultText === "Không nhận diện được.") {
        document.getElementById("chat-answer").innerText = "Không có thông tin về đồng xu này.";
      } else {
        askChatbot(`Thông tin chi tiết của ${resultText}`);
      }
  
    } catch (error) {
      document.getElementById("info").innerText = "Lỗi kết nối đến API!";
      document.getElementById("chat-answer").innerText = "Không thể lấy thông tin từ chatbot.";
    }
  }
  
  
  