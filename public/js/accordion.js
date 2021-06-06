$(document).ready(() => {
	let accordion = document.getElementsByClassName('accordion')[0];
	let items = [];
	if (!!accordion) {
		for (let i = 0; i < accordion.getElementsByClassName('accordion-item').length; i++) {
			const item = accordion.getElementsByClassName('accordion-item')[i];
			items.push(item);
			if (i === 0) {
				accordion.getElementsByClassName('accordion-item')[0].getElementsByClassName('accordion-body')[0].classList.add('accordion-active');
				accordion.getElementsByClassName('accordion-item')[0].getElementsByClassName('accordion-toggler')[0].classList.replace('fa-plus', 'fa-minus');
			}
		}

		items.forEach((item, key) => {
			item.getElementsByClassName('accordion-toggler')[0].addEventListener('click', e => {
				if (e.currentTarget.classList.contains('fa-plus')) {
					e.currentTarget.classList.replace('fa-plus', 'fa-minus');
					item.getElementsByClassName('accordion-body')[0].classList.add('accordion-active');
				} else if (e.currentTarget.classList.contains('fa-minus')) {
					e.currentTarget.classList.replace('fa-minus', 'fa-plus');
					item.getElementsByClassName('accordion-body')[0].classList.remove('accordion-active');
				}
			});
		});
	}
});