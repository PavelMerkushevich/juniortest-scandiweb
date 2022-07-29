import Product from "./Product.js";
import initGrid from "../grid.js";

function MainContent() {

    React.useEffect(() => {
        initGrid();
    });

    return (
        React.createElement("div", {
                id: "main-content"
            },
            React.createElement(Product, null),
            React.createElement(Product, null),
            React.createElement(Product, null),
            React.createElement(Product, null),
            React.createElement(Product, null),
            React.createElement(Product, null),
            React.createElement(Product, null),
            React.createElement(Product, null),
            React.createElement(Product, null),
            React.createElement(Product, null),
            React.createElement(Product, null),


        )
    )
}

export default MainContent;