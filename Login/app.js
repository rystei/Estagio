// Selecionando os elementos relevantes
const hamburger = document.querySelector(".hamburger");
const nav = document.querySelector(".nav");
const loginBtn = document.getElementById("loginBtn");
const loginDiv = document.getElementById("loginDiv");
const closeBtn = document.getElementById("closeBtn");

// Adicionando evento de clique ao botão de login
loginBtn.addEventListener("click", () => {
    // Alternando a visibilidade do botão de login
    loginBtn.style.display = "none";
    // Exibindo a div de login
    loginDiv.style.display = "block";
});

closeBtn.addEventListener("click", () => {
    // Ocultando a div de login
    loginDiv.style.display = "none";
    // Verificando se a navbar está ativa e se não estiver, exibindo o botão de login
    if (!nav.classList.contains("active")) {
        loginBtn.style.display = "block";
    }
});

hamburger.addEventListener("click", () => {
    nav.classList.toggle("active");
    if (nav.classList.contains("active")) {
        // Ocultando o botão de login quando a navbar está ativa
        loginBtn.style.display = "none";
    } else {
        // Exibindo o botão de login após a conclusão da animação de fechamento da navbar
        setTimeout(() => {
            loginBtn.style.display = "block";
        }, 1000); // Ajuste o tempo conforme necessário para corresponder à duração da animação
    }
    loginDiv.classList.toggle("active"); // Adiciona ou remove a classe "active" da tela de login
});
