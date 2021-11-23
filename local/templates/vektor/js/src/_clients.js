document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.clients')) {
        const clientsSlider = new Swiper('.clients__slider', {
            spaceBetween: 80,
            slidesPerView: 'auto',
            loop: true,
            simulateTouch: false,
            pagination: {
                el: '.clients-pagination',
                type: 'bullets',
                bulletClass: 'clients-pagination__bullet',
                bulletActiveClass: 'clients-pagination__bullet_active',
                clickable: true
            },
            navigation: {
                nextEl: '.clients-nav__next',
                prevEl: '.clients-nav__prev',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            breakpoints: {
                0: {
                    spaceBetween: 15
                },
                560: {
                    spaceBetween: 30
                },
                1280: {
                    spaceBetween: 80
                }
            }
        });
        if (document.querySelector('.clients__advantages-items')) {
            const advantagesSlider = new Swiper('.clients__advantages-items', {
                slidesPerView: 6,
                simulateTouch: false,
                breakpoints: {
                    0: {
                        slidesPerView: 2,
                        slidesPerGroup: 2,
                        spaceBetween: 0,
                    },
                    781: {
                        slidesPerView: 6,
                    }
                },
                pagination: {
                    el: '.clients__pagination',
                    type: 'bullets',
                    bulletClass: 'banner-pagination__bullet',
                    bulletActiveClass: 'banner-pagination__bullet_active',
                },
                navigation: {
                    nextEl: '.clients__arrows-item_next',
                    prevEl: '.clients__arrows-item_prev',
                },
            });


            let clientsDesc = document.querySelector('.clients__desc_adv');
            let originalStr = clientsDesc.innerHTML;
            let moreArrow = document.querySelector('.clients__more-arrow');


            setMapLineWidth();
            removeItemClass();
            shortDescText();

            window.addEventListener('resize', function () {
                setMapLineWidth();
                removeItemClass();
                shortDescText();
            });


            function setMapLineWidth() {
                if (document.querySelector('.clients__map-line')) {
                    let mapLine = document.querySelector('.clients__map-line');
                    let lineAttr = mapLine.getAttribute('d');
                    let arLineAttr = lineAttr.split(' ');

                    if (window.innerWidth <= 1600) {
                        arLineAttr[arLineAttr.length - 1] = '90';
                        mapLine.setAttribute('d', arLineAttr.join(' '));
                    } else if (window.innerWidth > 1600) {
                        arLineAttr[arLineAttr.length - 1] = '197';
                        mapLine.setAttribute('d', arLineAttr.join(' '));
                    }
                }
            }

            function removeItemClass() {
                let clientsAdv = document.querySelectorAll('.clients__advantages-slide');

                if (window.innerWidth <= 780) {
                    for (let i = 0; i < clientsAdv.length; i++) {
                        clientsAdv[i].classList.remove('clients__advantages-item');
                    }
                } else if (window.innerWidth > 780) {
                    for (let i = 0; i < clientsAdv.length; i++) {
                        clientsAdv[i].classList.add('clients__advantages-item');
                    }
                }
            }

            function shortDescText() {
                if (window.innerWidth <= 780) {
                    if (clientsDesc.innerHTML.length > 340) {
                        let newStr = clientsDesc.innerHTML.substring(0, 340);
                        clientsDesc.innerHTML = newStr + ' ...';
                        clientsDesc.appendChild(moreArrow);
                    }
                } else if (window.innerWidth > 780) {
                    clientsDesc.innerHTML = originalStr;
                }
            }
        }
    }
})