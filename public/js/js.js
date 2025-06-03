const API_BASE_URL = "http://127.0.0.1:5000";

/*
// Hàm gọi LLM để rút tên đồng xu từ văn bản Lens
async function getLensCoinName(lensTexts) {
  const question = `
Dưới đây là các đoạn văn bản trích xuất từ Google Lens:

${lensTexts}

Nhiệm vụ của bạn là xác định **tên đồng xu** được đề cập trong các đoạn văn trên.

Hãy chỉ trả về đúng **tên đồng xu** (ví dụ: "100 Yen Nhật Bản", "5 Đồng Việt Nam", "1 Euro Pháp").

Nếu không xác định được, chỉ cần trả về: "Không xác định".
  `.trim();

  try {
    const resp = await fetch(`${API_BASE_URL}/ask`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ question })
    });
    const json = await resp.json();
    return json.answer?.trim() || "Không xác định";
  } catch {
    return "Không xác định";
  }
}
*/

// Hàm upload ảnh và nhận kết quả từ CNN (ẩn các API khác)
async function uploadImageBoth() {
  const fileInput = document.getElementById('upload');
  if (!fileInput.files.length) {
    document.getElementById("info").innerText = "Vui lòng chọn một ảnh!";
    return;
  }
  const file = fileInput.files[0];

  // Hiển thị ảnh preview
  const reader = new FileReader();
  reader.onload = e => {
    const imgEl = document.getElementById('coin-image');
    imgEl.src = e.target.result;
    imgEl.classList.remove('hidden');
  };
  reader.readAsDataURL(file);

  // Chuẩn bị FormData cho CNN
  const formDataTrad = new FormData();
  formDataTrad.append("image", file);

  let dataTrad;
  try {
    const rTrad = await fetch(`${API_BASE_URL}/recognize`, {
      method: "POST",
      body: formDataTrad
    });
    dataTrad = await rTrad.json();
  } catch (err) {
    console.error("Lỗi khi gọi API:", err);
    document.getElementById("info").innerText = "Lỗi kết nối đến API!";
    // askChatbot("Tôi gặp lỗi khi nhận diện đồng xu, bạn có thể giúp tôi không?");
    return;
  }

  // Xử lý kết quả CNN
  let cnnText = "Không xác định";
  if (!dataTrad.error && dataTrad.coin_info) {
    const { TENXU, TENQG } = dataTrad.coin_info;
    cnnText = `${TENXU} ${TENQG}`;
  }

  document.getElementById("info").innerText = `CNN: ${cnnText}`;

  /*
  // Hỏi chatbot chi tiết về kết quả ưu tiên
  const target = cnnText !== "Không xác định"
               ? cnnText
               : (lensName !== "Không xác định" ? lensName : aiText);
  askChatbot(`Hãy cung cấp thông tin chi tiết về đồng xu: ${target}`);
  */
}

/*
// Hỏi chatbot để mô tả chi tiết đồng xu
async function askChatbot(question) {
  const chatAnswerElement = document.getElementById("chat-answer");
  try {
    const response = await fetch(`${API_BASE_URL}/ask`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ question })
    });
    const data = await response.json();
    chatAnswerElement.innerText = data.answer || "Chatbot không trả lời được câu hỏi.";
  } catch {
    chatAnswerElement.innerText = "Lỗi kết nối tới chatbot.";
  }
}
*/

// Xoá kết quả hiện tại
function clearResults() {
  document.getElementById('coin-image').src = "";
  document.getElementById('coin-image').classList.add('hidden');
  document.getElementById("info").innerText = "Kết quả sẽ hiển thị ở đây";
  document.getElementById("chat-answer").innerText = "Thông tin chi tiết sẽ hiển thị tại đây...";
}

// Mở/đóng menu
function toggleMenu() {
  document.querySelector('.nav').classList.toggle('show');
  document.querySelector('.user-options').classList.toggle('show');
}

// Gắn sự kiện nút
document.getElementById('btn-recognize').addEventListener('click', uploadImageBoth);
document.getElementById('btn-clear').addEventListener('click', clearResults);
document.getElementById('btn-menu').addEventListener('click', toggleMenu);
