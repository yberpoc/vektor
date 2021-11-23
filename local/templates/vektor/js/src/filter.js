document.addEventListener('DOMContentLoaded', () => {
    const filters = document.querySelectorAll('.filter');
    if (filters.length <= 0)
        return false;

    if (!document.querySelector('.filter_no-clone')) {
        const fixedFilter = filters[0].cloneNode(true);
        fixedFilter.classList.add('closed', 'filter_fixed', 'filter_clone');

        // Раньше фильтр появлялся только когда надо
        // window.addEventListener('scroll', function(e) {
        // 	const offsetFromFilter = document.querySelector('.filter').getBoundingClientRect().top;
        // 	if (offsetFromFilter + fixedFilter.scrollHeight + 200 < 0) {
        // 		fixedFilter.classList.add('filter_fixed');
        // 	} else {
        // 		fixedFilter.classList.remove('filter_fixed');
        // 		fixedFilter.classList.add('closed');
        // 	}
        // });

        document.body.appendChild(fixedFilter);
    }
    window.addTagsListeners = function () {
        const tagAllInput = document.querySelector('.filter__item-all input');
        if(tagAllInput)
            return false;

        // function filterResetOnClick(event) {
        //     const filterReset = event.currentTarget;
        //     const filterItems = filterReset.parentNode.parentNode.querySelectorAll('.filter__item-check:not(.filter__item-all)');
        //     const filterShowCounter = filterReset.parentNode.querySelector('.filter__show-counter');
        //
        //
        //     filterShowCounter.innerText = '1';
        //     document.querySelector('.filter__item-all input').checked = true;
        //     filterItems.forEach((item) => {
        //         const input = item.querySelector('input');
        //         input.checked = false;
        //     });
        // }

        document.querySelectorAll('.filter').forEach((filter) => {
            const select = filter.querySelector('.filter__select');

            if (select) {
                const choices = new Choices(select, {
                    searchEnabled: false,
                    resetScrollPosition: false,
                    itemSelectText: ''
                });
            }

            const filterToggle = filter.querySelector('.filter__header');
            // const filterReset = filter.querySelector('.filter__reset');
            const filterShow = filter.querySelector('.filter__show');
            const filterShowCounter = filterShow.querySelector('.filter__show-counter');
            const checks = filter.querySelectorAll('.filter__item-check:not(.filter__item-all) input');


            if (window.innerWidth < 1280)
                filter.classList.add('closed');

            filterShowCounter.innerText = countActiveCheck(filter);

            filterToggle.addEventListener('click', filterTogglerOnClick);
            // filterReset.addEventListener('click', filterResetOnClick);
            checks.forEach(check => {
                check.addEventListener('click', event => {
                    if (countActiveCheck(filter) === 0) {
                        tagAllInput.checked = true;
                        return;
                    }

                    tagAllInput.checked = false;
                    filterShowCounter.innerText = countActiveCheck(filter);
                });
            });
            tagAllInput.addEventListener('click', () => {
                if (countActiveCheck(filter) === 0) {
                    tagAllInput.checked = true;
                    return;
                }
                checks.forEach($check => $check.checked = false);
                // filterReset.parentNode.querySelector('.filter__show-counter').innerHTML = '1';
                filterShowCounter.innerHTML = '1';

            })
        });
    }
    window.addTagsListeners();

    const asideFilters = document.querySelectorAll('.filter_aside');

    if (asideFilters.length <= 0) {
        return false;
    }

    let timeout;

    window.addEventListener('resize', function () {
        clearTimeout(timeout);
        timeout = setTimeout(resizeChangeContent, 50);
    });

    function resizeChangeContent() {
        const filterContainer = document.querySelector('.aside-filter-wrap');
        const mobileContainer = document.querySelector(filterContainer.dataset.mobileContainer);


        if (window.innerWidth < 1280 && !mobileContainer.children.length) {
            mobileContainer.append(...filterContainer.children);

        } else if (window.innerWidth >= 1280 && !filterContainer.children.length) {
            filterContainer.append(...mobileContainer.children);
        }


    }

    resizeChangeContent();
});

function countActiveCheck(filter) {
    let activeChecksNum = 0;
    filter.querySelectorAll('.filter__item-check input').forEach((input) => {
        if (input.checked == true)
            activeChecksNum++
    });

    return activeChecksNum;
}

function filterTogglerOnClick(event) {
    const filter = event.currentTarget.parentNode;
    filter.classList.toggle('closed');

    if (filter.classList.contains('filter_clone')) {
        document.body.classList.toggle('no-scroll');
    }
}


