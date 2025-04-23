const API_BASE_URL = "http://127.0.0.1:5000";

// Hàm upload ảnh và nhận kết quả từ cả API truyền thống và AI
async function uploadImageBoth() {
  const fileInput = document.getElementById('upload');
  if (!fileInput.files.length) {
    document.getElementById("info").innerText = "Vui lòng chọn một ảnh!";
    return;
  }

  const file = fileInput.files[0];

  // Xem trước ảnh
  const reader = new FileReader();
  reader.onload = function(e) {
    const imgElement = document.getElementById('coin-image');
    imgElement.src = e.target.result;
    imgElement.classList.remove('hidden');
  };
  reader.readAsDataURL(file);

  const formDataTraditional = new FormData();
  formDataTraditional.append("image", file);

  let resultText = "";

  try {
    // Gọi API truyền thống
    const responseTraditional = await fetch(`${API_BASE_URL}/recognize`, {
      method: "POST",
      body: formDataTraditional
    });
    const dataTraditional = await responseTraditional.json();

    const threshold = 90;
    if (
      dataTraditional.error ||
      !dataTraditional.coin_info ||
      isNaN(dataTraditional.confidence) ||
      dataTraditional.confidence < threshold
    ) {
      // Nếu độ chính xác thấp → gọi AI
      const formDataAI = new FormData();
      formDataAI.append("file", file);

      const responseAI = await fetch(`${API_BASE_URL}/detect-coin-ai`, {
        method: "POST",
        body: formDataAI
      });
      const dataAI = await responseAI.json();
      resultText = dataAI.error ? dataAI.error : dataAI.result;
    } else {
      const coin = `${dataTraditional.coin_info.TENXU} ${dataTraditional.coin_info.TENQG}`;
      resultText = `${coin} (độ chính xác ${dataTraditional.confidence.toFixed(2)}%)`;
    }

    document.getElementById("info").innerText = resultText;

    // Luôn luôn gửi thông tin tới chatbot LLM
    const question = `Hãy cung cấp thông tin chi tiết về đồng xu: ${resultText}`;
    askChatbot(question);

  } catch (error) {
    document.getElementById("info").innerText = "Lỗi kết nối đến API!";
    console.error("Error during API request:", error);
    askChatbot("Tôi gặp lỗi khi nhận diện đồng xu, bạn có thể giúp tôi không?");
  }
}

// Hàm gọi chatbot để nhận thông tin chi tiết
async function askChatbot(question) {
  const chatAnswerElement = document.getElementById("chat-answer");

  try {
    const response = await fetch(`${API_BASE_URL}/ask`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ question })
    });

    const data = await response.json();
    const answer = data.answer || "Chatbot không trả lời được câu hỏi.";
    chatAnswerElement.innerText = answer;

  } catch (error) {
    console.error("Lỗi khi gọi API Chatbot:", error);
    chatAnswerElement.innerText = "Lỗi kết nối tới chatbot.";
  }
}

// Hàm xóa kết quả và reset giao diện
function clearResults() {
  const img = document.getElementById("coin-image");
  img.src = "";
  img.classList.add("hidden");
  document.getElementById("info").innerText = "Kết quả sẽ hiển thị ở đây";
  document.getElementById("chat-answer").innerText = "Thông tin chi tiết sẽ hiển thị tại đây...";
}
