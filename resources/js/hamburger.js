const hamburgerBtn = document.getElementById('hamburger-button');
const slideMenu = document.getElementById('slide-menu');
const overlay = document.getElementById('overlay');

hamburgerBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    slideMenu.classList.toggle('open');
    overlay.classList.toggle('active');
});

// メニュー内のクリックも伝播を止める
slideMenu.addEventListener('click', (e) => {
    e.stopPropagation();
});

// ドキュメントのどこかをクリックしたらメニューを閉じる
document.addEventListener('click', () => {
    slideMenu.classList.remove('open');
    overlay.classList.remove('active');
});