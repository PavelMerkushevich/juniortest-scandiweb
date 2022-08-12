var Product = function Product() {
    return React.createElement(
        "div",
        { className: "product" },
        React.createElement(
            "div",
            { className: "delete-checkbox-container" },
            React.createElement("input", { className: "form-check-input delete-checkbox", type: "checkbox", name: "checkbox" })
        ),
        React.createElement(
            "div",
            { className: "product-data-container" },
            React.createElement(
                "div",
                { className: "product-data" },
                "Apple"
            )
        )
    );
};

export default Product;