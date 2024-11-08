document.getElementById('filterButton').addEventListener('click', () => {
    // Get selected areas and characteristics
    const selectedAreas = Array.from(document.querySelectorAll('input[name="area"]:checked'))
        .map(checkbox => checkbox.value);
    const selectedCharacteristics = Array.from(document.querySelectorAll('input[name="characteristics"]:checked'))
        .map(checkbox => checkbox.value);

    // Filter places
    document.querySelectorAll('#posts .col').forEach(card => {
        const area = card.dataset.area;
        const characteristics = card.dataset.characteristics;

        // Check if the place matches selected filters
        const matchesArea = selectedAreas.length === 0 || selectedAreas.includes(area);
        const matchesCharacteristic = selectedCharacteristics.length === 0 || selectedCharacteristics.includes(characteristics);

        // Toggle visibility based on filter match
        if (matchesArea && matchesCharacteristic) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
