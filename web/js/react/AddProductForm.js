var _slicedToArray = function () { function sliceIterator(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"]) _i["return"](); } finally { if (_d) throw _e; } } return _arr; } return function (arr, i) { if (Array.isArray(arr)) { return arr; } else if (Symbol.iterator in Object(arr)) { return sliceIterator(arr, i); } else { throw new TypeError("Invalid attempt to destructure non-iterable instance"); } }; }();

var AddProductForm = function AddProductForm() {
    var _React$useState = React.useState(""),
        _React$useState2 = _slicedToArray(_React$useState, 2),
        selectValue = _React$useState2[0],
        setSelectValue = _React$useState2[1];

    var _React$useState3 = React.useState(),
        _React$useState4 = _slicedToArray(_React$useState3, 2),
        selectAdditionsValue = _React$useState4[0],
        setSelectAdditionsValue = _React$useState4[1];

    var selectHandler = function selectHandler(event) {
        var value = event.target.value;
        setSelectValue(value);
        switch (value) {
            case "dvd":
                setSelectAdditionsValue(React.createElement(
                    "div",
                    null,
                    React.createElement(
                        "label",
                        { htmlFor: "size" },
                        "Size (MB)"
                    ),
                    React.createElement("input", { id: "size", className: "form-control input", type: "number" }),
                    React.createElement(
                        "span",
                        null,
                        React.createElement(
                            "i",
                            null,
                            "Please, provide disc space in MB"
                        )
                    )
                ));
                break;

            case "book":
                setSelectAdditionsValue(React.createElement(
                    "div",
                    null,
                    React.createElement(
                        "label",
                        { htmlFor: "weight" },
                        "Weight (KG)"
                    ),
                    React.createElement("input", { id: "weight", className: "form-control input", type: "number" }),
                    React.createElement(
                        "span",
                        null,
                        React.createElement(
                            "i",
                            null,
                            "Please, provide book weight in Kg"
                        )
                    )
                ));
                break;

            case "furniture":
                setSelectAdditionsValue(React.createElement(
                    "div",
                    null,
                    React.createElement(
                        "label",
                        { htmlFor: "height" },
                        "Height (CM)"
                    ),
                    React.createElement("input", { id: "height", className: "form-control input", type: "number" }),
                    React.createElement(
                        "label",
                        { htmlFor: "width" },
                        "Width (CM)"
                    ),
                    React.createElement("input", { id: "width", className: "form-control input", type: "number" }),
                    React.createElement(
                        "label",
                        { htmlFor: "length" },
                        "Length (CM)"
                    ),
                    React.createElement("input", { id: "length", className: "form-control input", type: "number" }),
                    React.createElement(
                        "span",
                        null,
                        React.createElement(
                            "i",
                            null,
                            "Please, provide furniture size in Cm"
                        )
                    )
                ));
                break;
        }
    };

    return React.createElement(
        "div",
        { id: "main-content" },
        React.createElement(
            "form",
            { action: "", id: "product_form" },
            React.createElement(
                "label",
                { htmlFor: "sku" },
                "SKU"
            ),
            React.createElement("input", { id: "sku", className: "form-control input", type: "text" }),
            React.createElement(
                "label",
                { htmlFor: "name" },
                "Name"
            ),
            React.createElement("input", { id: "name", className: "form-control input", type: "text" }),
            React.createElement(
                "label",
                { htmlFor: "price" },
                "Price ($)"
            ),
            React.createElement("input", { id: "price", className: "form-control input", type: "number" }),
            React.createElement(
                "label",
                { htmlFor: "productType" },
                "Type Switcher"
            ),
            React.createElement(
                "select",
                { value: selectValue, onChange: selectHandler, name: "productType", id: "productType",
                    className: "form-select select" },
                React.createElement(
                    "option",
                    { value: "", disabled: true },
                    "Select Type"
                ),
                React.createElement(
                    "option",
                    { value: "dvd" },
                    "DVD"
                ),
                React.createElement(
                    "option",
                    { value: "book" },
                    "Book"
                ),
                React.createElement(
                    "option",
                    { value: "furniture" },
                    "Furniture"
                )
            ),
            selectAdditionsValue
        )
    );
};

export default AddProductForm;