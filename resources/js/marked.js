import { Marked } from "marked";

const marked = new Marked();

marked.use({
    breaks: true
})

const markdownInput = document.getElementById("markdown-input");
const preview = document.getElementById("preview");

markdownInput.addEventListener('input', updatePreview);

function updatePreview() {
    const markdownText = markdownInput.value;
    const htmlText = marked.parse(markdownText);
    preview.innerHTML = htmlText;
}

updatePreview();
