
 <input type="hidden" name="package_id" value="{{ $id}}">
        
        <div id="itinerary-container">
            <div class="itinerary-item">
                <label for="day">Day</label>
                <input type="text" name="itinerary[0][day]" >
                
                <label for="description">Description</label>
                <textarea name="itinerary[0][description]"></textarea>

                <label for="location">Location</label>
                <input type="text" name="itinerary[${index}][location]">

                <label for="time">Time</label>
                <input type="time" name="itinerary[${index}][time]">
            </div>
        </div>

        <button type="button" id="add-day">Add Day</button>
        <button type="submit">Save Itinerary</button>
    </form>
</div>

<script>
    document.getElementById('add-day').addEventListener('click', () => {
        const container = document.getElementById('itinerary-container');
        const index = container.querySelectorAll('.itinerary-item').length;

        const newDay = `
            <div class="itinerary-item">
                <label for="day">Day</label>
                <input type="text" name="itinerary[${index}][day]" required>
                
                <label for="description">Description</label>
                <textarea name="itinerary[${index}][description]" required></textarea>

                <label for="location">Location</label>
                <input type="text" name="itinerary[${index}][location]" required>

                <label for="time">Time</label>
                <input type="time" name="itinerary[${index}][time]" required>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', newDay);
    });
</script>
