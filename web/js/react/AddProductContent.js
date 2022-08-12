import AddProductForm from "./AddProductForm.js";

var AddProductContent = function AddProductContent() {

    var saveFormData = function saveFormData() {
        var sku = document.getElementById("sku").value;
        var name = document.getElementById("name").value;
        var price = document.getElementById("price").value;
        var productType = document.getElementById("productType").value;
        var productAttribute = void 0;
        switch (productType) {
            case "dvd":
                productAttribute = document.getElementById("size").value;
                break;
            case "book":
                productAttribute = document.getElementById("book").value;
                break;
            case "furniture":
                var furnitureHeight = document.getElementById("height").value;
                var furnitureWidth = document.getElementById("width").value;
                var furnitureLength = document.getElementById("length").value;
                productAttribute = furnitureHeight + "x" + furnitureWidth + "x" + furnitureLength;
                break;
        }
        //TODO: Допили Ajax
        fetch("https://api.example.com/items").then(function (res) {
            return res.json();
        }).then(function (result) {
            setIsLoaded(true);
            setItems(result);
        },
        // Примечание: важно обрабатывать ошибки именно здесь, а не в блоке catch(),
        // чтобы не перехватывать исключения из ошибок в самих компонентах.
        function (error) {
            setIsLoaded(true);
            setError(error);
        });
    };

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
            React.createElement(AddProductForm, null)
        )
    );
};

export default AddProductContent;