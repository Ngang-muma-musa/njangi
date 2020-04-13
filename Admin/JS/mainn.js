const tabBtn = document.querySelectorAll('.admincontent .btn a');
const tab = document.querySelectorAll('.tab');

function tabs(panelIndex) {
	tab.forEach(function(node) {
		node.style.display = 'none';
	});
	tab[panelIndex].style.display = 'block';
}
tabs(0);