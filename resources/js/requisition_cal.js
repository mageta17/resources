document.addEventListener('DOMContentLoaded', function () {
    let expenditureCount = 5; // Start counting from the existing number of cards
    const maxExpenditures = 20; // Set the limit to 20 cards

    // Function to calculate amount for a given card
    const calculateAmount = (count) => {
        const quantityInput = document.getElementById(`quantity${count}`);
        const unitPriceInput = document.getElementById(`unitPrice${count}`);
        const amountInput = document.getElementById(`amount${count}`);

        const quantity = parseFloat(quantityInput.value) || 0; // Default to 0 if not a number
        const unitPrice = parseFloat(unitPriceInput.value) || 0; // Default to 0 if not a number
        const amount = quantity * unitPrice; // Calculate total amount
        amountInput.value = amount.toFixed(2); // Set the calculated value

        // After calculating individual amount, update the total amount
        updateTotalAmount();
    };

    const updateTotalAmount = () => {
        let grandTotal = 0;

        // Loop through all amount inputs and sum the values
        for (let i = 1; i <= expenditureCount; i++) {
            const amountInput = document.getElementById(`amount${i}`);

            if (amountInput) {
                const amountValue = parseFloat(amountInput.value) || 0; // Get value or default to 0
                grandTotal += amountValue; // Add to grand total

                // Update the totalAmount${i} field with the corresponding amount
                const totalAmountField = document.getElementById(`totalAmount${i}`);
                if (totalAmountField) {
                    totalAmountField.value = amountValue.toFixed(2); // Set the individual total per input
                }
            }
        }

        // Update totalAmount1 with the grandTotal of all amounts
        document.getElementById('totalAmount1').value = grandTotal.toFixed(2); // Set totalAmount1 to grandTotal

        const total1 = parseFloat(document.getElementById('totalAmount1').value) || 0; 


        document.getElementById('totalAmount').value = (grandTotal + total1).toFixed(2);

        console.log('Grand Total:', grandTotal);
        console.log('Total Amount 1:', total1);
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

        // Hide the footer of the previous card added
        const previousCard = document.getElementById(`expenditure${expenditureCount}`);
        if (previousCard) {
            const previousFooter = previousCard.querySelector('.card-footer');
            if (previousFooter) {
                previousFooter.style.display = 'none';
            }
        }

        expenditureCount++;
        const newExpenditure = document.createElement('div');
        newExpenditure.classList.add('card');
        newExpenditure.id = `expenditure${expenditureCount}`;
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
                            <input type="number" class="form-control" id="quantity${expenditureCount}" name="quantity${expenditureCount}" value="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="unitPrice${expenditureCount}">Unit Price</label>
                            <input type="number" class="form-control" id="unitPrice${expenditureCount}" name="unitPrice${expenditureCount}" value="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="amount${expenditureCount}">Amount</label>
                            <input type="number" class="form-control" id="amount${expenditureCount}" name="amount${expenditureCount}" value="" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer card-background-color">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <span id="totalAmount">Total Amount in TZS/USD</span>
                        <input class="form-control" type="number" name="totalAmount" id="totalAmount${expenditureCount}" readonly>
                    </div>
                    <div class="col-md-6 mt-4">
                        <button id="add${expenditureCount}" class="btn btn-info">Add more</button>
                        <button id="submit${expenditureCount}" type="submit" name="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </div>
        `;

        document.getElementById('expenditures').appendChild(newExpenditure);

        // Add event listeners for the new card
        addEventListenersToCard(expenditureCount);

        // Add event listener for the new "Add more" button in the new card
        document.getElementById(`add${expenditureCount}`).addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('add').click(); // Trigger the original "Add more" button
        });
    });
});
