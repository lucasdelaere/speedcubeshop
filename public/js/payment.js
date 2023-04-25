//own multi-collapse code, which collapses other opened tabs so that only one is shown at a time.
let cards = document.querySelectorAll('.multi-collapse')

function toggleCollapse(el) {
    //get selected tab (radio button)
    let cardId = el.getAttribute('aria-controls')
    let card = document.querySelector('#' + cardId)

    //collapse all tabs
    for (let card of cards) {
        card.classList.remove('show');
    }
    //show only the selected tab
    card.classList.add('show');

}