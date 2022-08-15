var _slicedToArray = function () { function sliceIterator(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"]) _i["return"](); } finally { if (_d) throw _e; } } return _arr; } return function (arr, i) { if (Array.isArray(arr)) { return arr; } else if (Symbol.iterator in Object(arr)) { return sliceIterator(arr, i); } else { throw new TypeError("Invalid attempt to destructure non-iterable instance"); } }; }();

import AddProductForm from "./AddProductForm.js";

var AddProductContent = function AddProductContent() {
    var _React$useState = React.useState(null),
        _React$useState2 = _slicedToArray(_React$useState, 2),
        alertBlock = _React$useState2[0],
        setAlertBlock = _React$useState2[1];

    function saveFormData() {
        var inputs = document.getElementsByClassName("input");

        if (validateForm(inputs)) {
            clearError();
            var request = {};
            Array.from(inputs).map(function (input) {
                request[input.id] = input.value;
            });
            $.ajax({
                url: 'http://juniortest/add-product-handler',
                method: 'post',
                dataType: 'html',
                data: request,
                success: function success(data) {
                    if (data.status) {
                        console.log("ok");
                    } else {
                        console.log("bad");
                        //viewValidationError()
                    }
                },
                error: function error() {
                    viewError();
                }
            });
        } else {
            viewValidationError();
        }

        function viewValidationError() {
            setAlertBlock(React.createElement(
                "div",
                { className: "alert alert-danger alert-dismissible fade show", role: "alert",
                    style: { marginTop: "10px" } },
                "Some fields are not filled or filled incorrectly!"
            ));
        }

        function viewError() {
            setAlertBlock(React.createElement(
                "div",
                { className: "alert alert-danger alert-dismissible fade show", role: "alert",
                    style: { marginTop: "10px" } },
                "Something went wrong!",
                React.createElement("button", { type: "button", className: "btn-close", "data-bs-dismiss": "alert", "aria-label": "Close" })
            ));
        }

        function clearError() {
            setAlertBlock("");
        }
    }

    function validateForm(inputs) {
        var invalid = false;
        var numInputs = document.getElementsByClassName("input num");
        var productType = document.getElementById("productType");

        if (productType.value == "") {
            productType.classList.add("is-invalid");
            invalid = true;
        }

        Array.from(inputs).forEach(function (input) {
            if (input.value === "") {
                input.classList.add("is-invalid");
                invalid = true;
            }
        });

        Array.from(numInputs).forEach(function (input) {
            if (Number.isInteger(input.value) && input.value >= 0) {
                input.classList.add("is-invalid");
                invalid = true;
            }
        });

        return !invalid;
    }

    return React.createElement(
        "div",
        null,
        React.createElement(
            "header",
            null,
            React.createElement(
                "div",
                { id: "header-content" },
                React.createElement(
                    "h1",
                    { className: "title" },
                    documentTitle
                ),
                React.createElement(
                    "div",
                    { className: "button-container" },
                    React.createElement(
                        "button",
                        { className: "btn btn-success header-button", onClick: saveFormData },
                        "Save"
                    ),
                    React.createElement(
                        "a",
                        { href: cancelButtonHref },
                        React.createElement(
                            "button",
                            { className: "btn btn-secondary header-button" },
                            "Cancel"
                        )
                    )
                )
            )
        ),
        React.createElement(
            "main",
            null,
            React.createElement(
                "div",
                null,
                alertBlock
            ),
            React.createElement(AddProductForm, null)
        )
    );
};

export default AddProductContent;