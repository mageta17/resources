document.addEventListener('DOMContentLoaded', function() {
    const approveButtons = document.querySelectorAll('#approve_btn');
    const disapproveButtons = document.querySelectorAll('#disapprove_btn');

    approveButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const actualSpareName = btn.closest('tr').querySelector('span.actual').textContent.trim();
            
            if (actualSpareName == '') {
                alert('Actual Spare Name cannot be empty.');
                return;
            }

            const approveRow = btn.closest('tr').nextElementSibling;
            const disapproveRow = approveRow.nextElementSibling;

            approveRow.style.display = 'contents';
            disapproveRow.style.display = 'none';

            approveRow.querySelector('#cancel').addEventListener('click', function() {
                approveRow.style.display = 'none';
            });
        });
    });

    disapproveButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const actualSpareName = btn.closest('tr').querySelector('span.actual').textContent.trim();
            
            if (actualSpareName == '') {
                alert('Actual Spare Name cannot be empty.');
                return;
            }

            const disapproveRow = btn.closest('tr').nextElementSibling.nextElementSibling;
            const approveRow = btn.closest('tr').nextElementSibling;

            disapproveRow.style.display = 'contents';
            approveRow.style.display = 'none';

            disapproveRow.querySelector('#cancel').addEventListener('click', function() {
                disapproveRow.style.display = 'none';
            });
        });
    });
});
