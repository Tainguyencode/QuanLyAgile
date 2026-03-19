<style>
    .sidebar {
        width: 280px;
        min-height: 120vh;
        overflow-y: auto; 
        background: #fdf9f5;
        padding: 20px 12px;
        border-right: 1px solid #eee1d5;
        box-shadow: 2px 0 10px rgba(0,0,0,0.03);
        margin-right: 10px
    }
    .sidebar-section a:hover {
        background: #f4ede4;
        color: #c9a67e;
    }
    .hot-item {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
        padding: 6px 8px;
        border-radius: 8px;
        transition: 0.25s;
    }

    .hot-item:hover {
        background: #f8f1e9;
    }

    .hot-item img {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 8px;
    }

    .hot-item p {
        margin: 0;
        font-size: 12.5px;
        line-height: 1.3;
        color: #4a3728;
    }

    .hot-item span {
        font-size: 11px;
        color: #c9a67e;
        display: block;
    }

</style>
<div class="sidebar">

    <div class="sidebar-section">
        <h3>Danh mục</h3>

        <a href="#">🍔 Burger</a>
        <a href="#">🍕 Pizza</a>
        <a href="#">🍟 Đồ chiên</a>
        <a href="#">🥤 Nước uống</a>
        <a href="#">🍗 Gà rán</a>
    </div>

    <div class="sidebar-section mt-3">
        <h3>Sản phẩm hot 🔥</h3>

        <div class="hot-item">
            <img src="https://images.unsplash.com/photo-1550547660-d9450f859349">
            <div>
                <p>Burger bò phô mai</p>
                <span>45.000đ</span>
            </div>
        </div>
        <div class="hot-item">
            <img src="https://images.unsplash.com/photo-1550547660-d9450f859349">
            <div>
                <p>Burger bò phô mai</p>
                <span>45.000đ</span>
            </div>
        </div>

        <div class="hot-item">
            <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591">
            <div>
                <p>Pizza hải sản</p>
                <span>89.000đ</span>
            </div>
        </div>

        <div class="hot-item">
            <img src="https://images.unsplash.com/photo-1622483767028-3f66f32aef97">
            <div>
                <p>Combo snack + nước</p>
                <span>25.000đ</span>
            </div>
        </div>

    </div>

</div>