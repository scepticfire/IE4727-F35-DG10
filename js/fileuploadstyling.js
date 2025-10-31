document.getElementById('image').addEventListener('change', function() {
  const fileName = this.files[0]?.name || 'No file chosen';
  document.getElementById('file-name').textContent = fileName;
});

document.querySelector('form').addEventListener('reset', function() {
  document.getElementById('file-name').textContent = 'No file chosen';
});