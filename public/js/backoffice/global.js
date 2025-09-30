// เปิดด้วย .btn-topbar-link และปิดด้วย .btn-close-nav
document.addEventListener('DOMContentLoaded', function () {
    const openBtn = document.querySelector('.btn-topbar-link');
    const closeBtn = document.querySelector('.btn-close-nav');
    const nav = document.querySelector('.page-sidebar'); // สมมติว่ามี element นี้

    if (openBtn && nav) {
        openBtn.addEventListener('click', function () {
            nav.classList.add('open');
        });
    }

    if (closeBtn && nav) {
        closeBtn.addEventListener('click', function () {
            nav.classList.remove('open');
        });
    }

    // const btnItemTitle = document.querySelectorAll('.sidebar-item-title');
    // btnItemTitle.forEach(function (btn) {
    //     btn.addEventListener('click', function () {
    //         const allTitles = document.querySelectorAll('.sidebar-item-title');
    //         const allContents = document.querySelectorAll('.sidebar-item-content');

    //         // ปิดทุกเมนู
    //         allTitles.forEach(t => t.classList.remove('show'));
    //         allContents.forEach(content => {
    //             content.style.maxHeight = null;
    //         });

    //         // เปิดเมนูที่คลิก (ถ้ายังไม่เปิด)
    //         const content = this.nextElementSibling;
    //         if (content.style.maxHeight === '' || content.style.maxHeight === '0px') {
    //             this.classList.add('show');
    //             content.style.maxHeight = content.scrollHeight + 'px';
    //         }
    //     });
    // });

    $(".sidebar-item-title").on('click', function(){
        const $this = $(this);
        const $content = $this.next();

        if ($content.is(':visible')) {
            $this.removeClass('show');
            $content.slideUp('normal');
        } else {
            $('.sidebar-item-title').removeClass('show');
            $('.sidebar-item-content').slideUp('normal');

            $this.addClass('show');
            $content.slideDown('normal');
        }
    });

    const btnGlobalTheme = document.querySelectorAll('.btn-global-theme');
    const themedefault = localStorage.getItem('theme');
    document.documentElement.className = themedefault;
    btnGlobalTheme.forEach(function (btn) {
        if (btn.getAttribute('data-theme') === themedefault) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });

    btnGlobalTheme.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const theme = this.getAttribute('data-theme');
            document.documentElement.className = theme;
            localStorage.setItem('theme', theme);

            btnGlobalTheme.forEach(function (b) {
                b.classList.remove('active');
            });

            this.classList.add('active');
        });
    });
});