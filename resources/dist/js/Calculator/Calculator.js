/*
TODO:
    Limit number input
    Disallow . from being entered multiple times
    Clean up structure
*/

(function() {
    "use strict";

    // Shortcut to get elements
    var el = function(element) {
        if (element.charAt(0) === "#") { // If passed an ID...
            return document.querySelector(element); // ... returns single element
        }

        return document.querySelectorAll(element); // Otherwise, returns a nodelist
    };

    // Variables
    var viewer = el("#viewer"), // Calculator screen where result is displayed
        equals = $('.equals'), // Equal button
        nums = $(".num"), // List of numbers
        ops = $(".ops"), // List of operators
        theNum = 0, // Current number
        oldNum = 0, // First number
        resultNum, // Result
        operator; // Batman

    // When: Number is clicked. Get the current number selected
    var setNum = function() {
        if (resultNum) { // If a result was displayed, reset number
            theNum = this.getAttribute("data-num");
            resultNum = 0;
        } else { // Otherwise, add digit to previous number (this is a string!)
            theNum +=this.getAttribute("data-num");
        }

        viewer.innerHTML = parseFloat(theNum); // Display current number

    };

    // When: Operator is clicked. Pass number to oldNum and save operator
    var moveNum = function(el) {
        if(paymentObj.total >= paymentObj.total_amount){
            viewer.innerHTML = paymentObj.total + ' SAR';
            oldNum = 0;
            theNum = 0;
            alert("this Order has Fully Payments!");
            return false;
        }
        if(parseFloat(theNum) === 0) return false;
        // Perform operation
        switch ($(this).index()) {
            case 0:
                paymentObj.cash = paymentObj.cash + parseFloat(theNum);
                $(this).find('span').html(parseFloat(paymentObj.cash));
                payments.push({payment_method:'CASH',amount:paymentObj.cash,date:today,outstanding_balance:(parseFloat(paymentObj.total_amount) - (paymentObj.total + parseFloat(theNum)))  ,status:'COMPLETE'});
                break;

            case 1:
                paymentObj.mada =  paymentObj.mada + parseFloat(theNum);
                $(this).find('span').html(parseFloat(paymentObj.mada));
                payments.push({payment_method:'MADA',amount:paymentObj.mada,date:today,outstanding_balance:(parseFloat(paymentObj.total_amount) - (paymentObj.total + parseFloat(theNum)))  ,status:'COMPLETE'});
                break;

            case 2:
                paymentObj.visa =  paymentObj.visa + parseFloat(theNum);
                $(this).find('span').html(parseFloat(paymentObj.visa) );
                payments.push({payment_method:'VISA',amount:paymentObj.visa,date:today,outstanding_balance:(parseFloat(paymentObj.total_amount) - (paymentObj.total + parseFloat(theNum)))  ,status:'COMPLETE'});
                break;

            case 3:
                paymentObj.mastercard = paymentObj.mastercard + parseFloat(theNum);
                $(this).find('span').html(parseFloat(paymentObj.mastercard) );
                payments.push({payment_method:'MASTERCARD',amount:paymentObj.mastercard,date:today,outstanding_balance:(parseFloat(paymentObj.total_amount) - (paymentObj.total + parseFloat(theNum)))  ,status:'COMPLETE'});
                break;
        }
        displayNum();
        oldNum = parseFloat(theNum);
        theNum = 0;
        operator = this.getAttribute("data-ops");
        equals.attr("data-result", ""); // Reset result in attr
    };

    // When: Equals is clicked. Calculate result
    var displayNum = function() {

        // Convert string input to numbers
        oldNum = parseFloat(oldNum);
        theNum = parseFloat(theNum);

        // Perform operation
        switch (operator) {
            case "plus":
                resultNum = oldNum + theNum;
                break;

            case "minus":
                resultNum = oldNum - theNum;
                break;

            case "times":
                resultNum = oldNum * theNum;
                break;

            case "divided by":
                resultNum = oldNum / theNum;
                break;

            // If equal is pressed without an operator, keep number and continue
            default:
                resultNum = theNum;
        }
        // If NaN or Infinity returned
        if (!isFinite(resultNum)) {
            if (isNaN(resultNum)) { // If result is not a number; set off by, eg, double-clicking operators
                resultNum = "You broke it!";
            } else { // If result is infinity, set off by dividing by zero
                resultNum = "Look at what you've done";
                el('#calculator').classList.add("broken"); // Break calculator
                el('#reset').classList.add("show"); // And show reset button
            }
        }

        // Display result, finally!
        viewer.innerHTML = resultNum + ' SAR';
        paymentObj.total = resultNum;
        paymentObj.outstanding_balance = (paymentObj.total - paymentObj.total_amount);
        $('#outstanding_balance').html(-paymentObj.outstanding_balance.toFixed(1));
        equals.attr("data-result", resultNum);
        // Now reset oldNum & keep result
        oldNum = 0;
        theNum = resultNum;

    };

    // When: Clear button is pressed. Clear everything
    var clearAll = function() {
        oldNum = 0;
        theNum = 0;
        viewer.innerHTML = 0.00;
        paymentObj.cash = 0;
        paymentObj.mada = 0;
        paymentObj.mastercard = 0;
        paymentObj.visa = 0;
        paymentObj.total = 0.00;
        paymentObj.outstanding_balance = 0.00;
        payments = [];
        $('#outstanding_balance').html(0.00+' SAR');
        ops.find('span').html(0);
        equals.attr("data-result", resultNum);
    };

    /* The click events */

    // Add click event to numbers
    for (var i = 0, l = nums.length; i < l; i++) {
        nums[i].onclick = setNum;
    }

    // Add click event to operators
    for (var i = 0, l = ops.length; i < l; i++) {
        ops[i].onclick = moveNum;
    }

    // Add click event to equal sign
    equals.onclick = displayNum;

    // Add click event to clear button
    el("#clear").onclick = clearAll;
    $("#clear2").click(function () {
        clearAll();
    });

    // Add click event to reset button
    // el("#reset").onclick = function() {
    //     window.location = window.location;
    // };

}());