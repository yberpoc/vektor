document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.contacts-map')) {
        var myMap;

        ymaps.ready(init);

        function init() {
            let startX = parseFloat(document.querySelectorAll('.swiper-slide.tabs-item')[0].getAttribute('data-map-x'))
            let startY = parseFloat(document.querySelectorAll('.swiper-slide.tabs-item')[0].getAttribute('data-map-y'))
            myMap = new ymaps.Map('contacts-map', {
                center: [startX, startY],
                zoom: 16,
                controls: [],
                suppressMapOpenBlock: true
            });
            if ($(window).width() < '990') { //Запрещаем скролл на мобилках + выводим уведомление о том, как правильно скроллить.
                myMap.behaviors.disable('drag');

                myMap.events.add('multitouchstart', function(e) {
                    $('.am_map_alert').css({ "opacity": "0" });
                });
            }
            var myPlacemark = new ymaps.Placemark(myMap.getCenter(), {}, {
                    iconLayout: 'default#image',
                    iconImageHref: '/local/templates/vector/img/contacts/point.svg',
                    iconImageSize: [75, 92],
                    iconImageOffset: [-37, -92]
                }),
                ZoomLayout = ymaps.templateLayoutFactory.createClass("<div class='contacts-map__zoom'>" +
                    "<div class='contacts-map__zoom-in'>+</div>" +
                    "<div class='contacts-map__zoom-out'>-</div>" +
                    "</div>", {

                        build: function() {
                            ZoomLayout.superclass.build.call(this);
                            this.zoomInCallback = ymaps.util.bind(this.zoomIn, this);
                            this.zoomOutCallback = ymaps.util.bind(this.zoomOut, this);
                            document.querySelector('.contacts-map__zoom-in').addEventListener('click', this.zoomInCallback);
                            document.querySelector('.contacts-map__zoom-out').addEventListener('click', this.zoomOutCallback);
                        },

                        zoomIn: function() {
                            var map = this.getData().control.getMap();
                            map.setZoom(map.getZoom() + 1, { checkZoomRange: true });
                        },

                        zoomOut: function() {
                            var map = this.getData().control.getMap();
                            map.setZoom(map.getZoom() - 1, { checkZoomRange: true });
                        }
                    }),
                zoomControl = new ymaps.control.ZoomControl({ options: { layout: ZoomLayout } });

            myMap.controls.add(zoomControl);

            myMap.geoObjects.add(myPlacemark);

            myMap.behaviors.disable(['scrollZoom']);

            let tabs = document.querySelectorAll('.swiper-slide.tabs-item')
            for (let tab of tabs) {
                let x = parseFloat(tab.getAttribute('data-map-x'))
                let y = parseFloat(tab.getAttribute('data-map-y'))
                let NewPlacemark = new ymaps.Placemark([x, y], {}, {
                    iconLayout: 'default#image',
                    iconImageHref: '/local/templates/vector/img/contacts/point.svg',
                    iconImageSize: [75, 92],
                    iconImageOffset: [-37, -92]
                })
                myMap.geoObjects.add(NewPlacemark);
                tab.addEventListener('click', (e) => {
                    myMap.panTo(
                        [x, y], {
                            flying: true,
                            duration: 2000
                        }
                    )
                })
            }
        }
    }
})