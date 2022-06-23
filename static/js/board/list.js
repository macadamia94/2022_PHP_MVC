(function() {
    const trList = document.querySelectorAll('tbody > tr');
    
    trList.forEach(item => {
        item.addEventListener('click', function() {
            location.href=`detail?i_board=${item.dataset.i_board}`
        })
    });
})();