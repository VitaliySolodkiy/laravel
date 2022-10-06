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
});

const articleTitles = document.querySelectorAll('.article-name');

articleTitles.forEach(title => {
    title.addEventListener('click', () => {
        if (title.dataset.edit === 'false') {
            title.dataset.edit = 'true';
            articleTitles.forEach(t => t.dataset.edit === 'false' ? t.dataset.edit = 'lock' : '');

            if (title.dataset.edit === 'true') {
                let input = document.createElement('input');
                input.type = 'text';
                input.value = title.firstElementChild.textContent;
                title.firstElementChild.replaceWith(input);
                input.focus();

                input.addEventListener('blur', () => {
                    const id = title.closest('tr').dataset.id;
                    const newTitle = input.value;
                    axios.get(`/admin/articles/changeArticleName/${id}/${newTitle}`)
                        .then(response => {
                            if (response.data.success) {
                                let paragraph = document.createElement('p');
                                paragraph.innerText = newTitle;
                                input.replaceWith(paragraph);
                                title.dataset.edit = 'false';
                                articleTitles.forEach(t => t.dataset.edit === 'lock' ? t.dataset.edit = 'false' : '');
                            }
                        })
                })
            }
        }
    })
})