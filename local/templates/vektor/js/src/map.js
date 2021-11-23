document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector('#map')) {
		var mapArr = {
			"type": "FeatureCollection",
			"features": [
				{ "type": "Feature", "id": 0, "geometry": { "type": "Point", "coordinates": [25.831903, 37.411961] }, },
				{ "type": "Feature", "id": 1, "geometry": { "type": "Point", "coordinates": [43.763338, 37.565466] }, },
				{ "type": "Feature", "id": 2, "geometry": { "type": "Point", "coordinates": [55.763338, 36.565466] }, },
				{ "type": "Feature", "id": 3, "geometry": { "type": "Point", "coordinates": [55.744522, 47.616378] }, },
				{ "type": "Feature", "id": 4, "geometry": { "type": "Point", "coordinates": [52.780898, 57.642889] }, },
				{ "type": "Feature", "id": 5, "geometry": { "type": "Point", "coordinates": [55.793559, 55.435983] }, },
				{ "type": "Feature", "id": 6, "geometry": { "type": "Point", "coordinates": [35.800584, 34.675638] }, },
				{ "type": "Feature", "id": 7, "geometry": { "type": "Point", "coordinates": [55.716733, 37.589988] }, },
				{ "type": "Feature", "id": 8, "geometry": { "type": "Point", "coordinates": [55.775724, 36.56084] }, },
				{ "type": "Feature", "id": 9, "geometry": { "type": "Point", "coordinates": [55.822144, 37.433781] }, },
				{ "type": "Feature", "id": 10, "geometry": { "type": "Point", "coordinates": [54.876327, 37.431744] }, },
				{ "type": "Feature", "id": 0, "geometry": { "type": "Point", "coordinates": [55.831903, 37.411961] }, },
				{ "type": "Feature", "id": 1, "geometry": { "type": "Point", "coordinates": [43.763338, 37.565466] }, },
				{ "type": "Feature", "id": 2, "geometry": { "type": "Point", "coordinates": [55.763338, 36.565466] }, },
				{ "type": "Feature", "id": 3, "geometry": { "type": "Point", "coordinates": [55.744522, 37.616378] }, },
				{ "type": "Feature", "id": 4, "geometry": { "type": "Point", "coordinates": [52.780898, 32.642889] }, },
				{ "type": "Feature", "id": 5, "geometry": { "type": "Point", "coordinates": [55.793559, 55.435983] }, },
				{ "type": "Feature", "id": 6, "geometry": { "type": "Point", "coordinates": [35.800584, 34.675638] }, },
				{ "type": "Feature", "id": 7, "geometry": { "type": "Point", "coordinates": [55.716733, 37.589988] }, },
				{ "type": "Feature", "id": 8, "geometry": { "type": "Point", "coordinates": [55.775724, 36.56084] }, },
				{ "type": "Feature", "id": 9, "geometry": { "type": "Point", "coordinates": [55.822144, 37.433781] }, },
				{ "type": "Feature", "id": 10, "geometry": { "type": "Point", "coordinates": [54.876327, 37.431744] }, },
			]
		}

		ymaps.ready(init);

		function init() {
			var myMap = new ymaps.Map("map", {
				center: [55.76, 37.64],
				zoom: 4,
				controls: []
			}),
				objectManager = new ymaps.ObjectManager({
					clusterize: true,
					gridSize: 32,
					clusterDisableClickZoom: true,
					hasBalloon: false,
					hasHint: false
				});

			objectManager.objects.options.set('preset', {
				iconLayout: 'default#image',
				iconImageHref: '../img/SVG/point.svg',
				iconImageSize: [24, 32],
			});
			objectManager.clusters.options.set('preset', {
				clusterColor: '#fff',
				clusterIcons: [{
					href: '../img/SVG/ellipse.svg',
					size: [40, 40],
					offset: [-20, -20]
					},
					{
						href: '../img/SVG/ellipse.svg',
						size: [80, 80],
						offset: [-40, -40]
				}],
				clusterNumbers: [6], 
				
			});
			
			myMap.geoObjects.add(objectManager);

			objectManager.add(mapArr);

			myMap.behaviors.disable(['scrollZoom']);
		}
	}
})