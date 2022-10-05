import './bootstrap';
const importantBtns = document.querySelectorAll('.important-js');

importantBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.closest('tr').dataset.id;
        axios.get(`/admin/articles/changeImportant/${id}`)
            .then(response => {
                if (response.data.success) {
                    // btn.textContent = btn.textContent === '0' ? 1 : 0;
                    btn.textContent = +response.data.content;
                    btn.classList.remove('text-success', 'text-danger');
                    btn.classList.add(response.data.content ? 'text-success' : 'text-danger')
                }
            })
    })
})``