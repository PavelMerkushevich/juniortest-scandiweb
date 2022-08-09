function Product() {
    return (
        <div className="product">
            <div className="delete-checkbox-container">
                <input className="form-check-input delete-checkbox" type="checkbox" name="checkbox"/>
            </div>
            <div className="product-data-container">
                <div className="product-data">Apple</div>
            </div>
        </div>
    )
}

export default Product;