document.addEventListener('DOMContentLoaded', function () {
    let expenditureCount = 5; // Start counting from the existing number of cards
    const maxExpenditures = 20; //limit to 20 cards

    // calculation functions 
    const calculateAmount = (count) => {
        const quantityInput = document.getElementById(`quantity${count}`);
        const unitPriceInput = document.getElementById(`unitPrice${count}`);
        const amountInput = document.getElementById(`amount${count}`);

        const quantity = parseFloat(quantityInput.value) || 0; // Default to 0 if not a number
        const unitPrice = parseFloat(unitPriceInput.value) || 0; // Default to 0 if not a number
        const amount = quantity * unitPrice; // Calculate total amount
        amountInput.value = amount.toFixed(2); // set the calculated value

        // After calculating individual amount, update the total amount
        updateTotalAmount();
    };  

    //  function to update / calculate total amount
    const updateTotalAmount = () => {
        let Total = 0;

        // Loop through all amount inputs and sum the values
        for (let i = 1; i <= expenditureCount; i++) {
            const amountInput = document.getElementById(`amount${i}`);

            if (amountInput) {
                const amountValue = parseFloat(amountInput.value) || 0; // Get value or default to 0
                Total += amountValue; // Add to grand total
            }
        }

        // Update the total amount field
        document.getElementById('totalAmount1').value = Total.toFixed(2); // Set totalAmount1 to grandTotal
        document.getElementById('totalAmount').value = Total.toFixed(2); // Update the overall total

        console.log('Total:', Total);
    };

    // Function to add event listeners to existing and new cards
    const addEventListenersToCard = (count) => {
        const quantityInput = document.getElementById(`quantity${count}`);
        const unitPriceInput = document.getElementById(`unitPrice${count}`);

        quantityInput.addEventListener('input', () => calculateAmount(count));
        unitPriceInput.addEventListener('input', () => calculateAmount(count));
    };

    // Adding event listeners for the initially present cards
    for (let i = 1; i <= expenditureCount; i++) {
        addEventListenersToCard(i);
    }

    document.getElementById('add').addEventListener('click', function (event) {
        event.preventDefault();

        // Check if the maximum limit is reached
        if (expenditureCount >= maxExpenditures) {
            alert('You have reached the maximum limit of 20 expenditures.');
            return; // Prevent adding more than 20 cards
        }

        expenditureCount++;
        const newExpenditure = document.createElement('div');
        newExpenditure.classList.add('card');
        newExpenditure.id = `expenditure${expenditureCount}`;
        // html rendering for adding more cards /expendicture
        newExpenditure.innerHTML = `
            <div class="card-header">Expenditure ${expenditureCount}: <i>Specify</i></div>
            <div class="card-body card-background-color">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="description${expenditureCount}">Description</label>
                            <input type="text" class="form-control" id="description${expenditureCount}" name="description${expenditureCount}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="quantity${expenditureCount}">Quantity</label>
                            <input type="number" class="form-control" id="quantity${expenditureCount}" name="quantity${expenditureCount}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for = "unitPrice${expenditureCount}" > Unit Price <i class = "small text-success"> (per one item) </i></label>
                            <input type="number" class="form-control" id="unitPrice${expenditureCount}" name="unitPrice${expenditureCount}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="amount${expenditureCount}">Amount</label>
                            <input type="text" class="form-control" id="amount${expenditureCount}" name="amount${expenditureCount}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Insert the new expenditure below expenditure5 and above the footer
        const expenditure5 = document.getElementById('expenditure5');
        const footer = document.getElementById('default-footer');
        if (expenditure5) {
            // Insert the new expenditure card before the footer
            expenditure5.parentNode.insertBefore(newExpenditure, footer);
        }

        // Add event listeners for the new card
        addEventListenersToCard(expenditureCount);
    });
});
