import Product from "./Product.js";
import initGrid from "../grid.js";

var IndexContent = function IndexContent() {

    React.useEffect(function () {
        initGrid();
    });

    var content = [];
    for (var i = 0; i < 10; i++) {
        content.push(React.createElement(Product, null));
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
                        "a",
                        { href: addButtonHref },
                        React.createElement(
                            "button",
                            { className: "btn btn-success header-button" },
                            "ADD"
                        )
                    ),
                    React.createElement(
                        "button",
                        { id: "delete-product-btn", className: "btn btn-danger header-button" },
                        "MASS DELETE"
                    )
                )
            )
        ),
        React.createElement(
            "main",
            null,
            React.createElement(
                "div",
                { id: "main-content" },
                content
            )
        )
    );
};

export default IndexContent;