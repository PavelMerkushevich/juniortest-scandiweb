import Product from "./Product.js";
import initGrid from "../grid.js";

function MainContent() {

    React.useEffect(function () {
        initGrid();
    });

    var content = [];
    for (var i = 0; i < 10; i++) {
        content.push(React.createElement(Product, null));
    }

    return React.createElement(
        "div",
        { id: "main-content" },
        content
    );
}

export default MainContent;