document.addEventListener("DOMContentLoaded", () => {
    const addButton = document.getElementById("add-button");
    const tableBody = document.getElementById("result-content");
    let items = [];
    let nextId = 1;

    addButton.addEventListener("click", () => {
        const label = document.getElementById("label").value
        const length = parseFloat(document.getElementById("length").value);
        const rolls = parseInt(document.getElementById("rolls").value);
        const price = parseInt(document.getElementById("price").value);

        if (isNaN(length) || isNaN(rolls) || isNaN(price)) {
            alert('すべての項目を入力してください。');
            return;
        }
        if (rolls <= 0 || length <= 0) {
            alert('ロール数と長さは 1 以上の値を入力してください。');
            return;
        }

        const id = generateId();
        const totalLength = length * rolls;
        const costPerMeter = (price / totalLength);

        // 配列に追加
        items.push({
            id,
            label,
            price,
            rolls,
            length,
            costPerMeter
        });

        // コスパ順でソート
        items.sort((x, y) => x.costPerMeter - y.costPerMeter);
        renderTable();

        // 入力をリセット
        document.getElementById("label").value = "";
        document.getElementById("length").value = "";
        document.getElementById("rolls").value = "";
        document.getElementById("price").value = "";
    });

    // テーブルを再描画
    function renderTable() {
        tableBody.innerHTML = "";
        items.forEach((item, index) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${item.label}</td>
                <td>${item.price}</td>
                <td>${item.rolls}</td>
                <td>${item.length}</td>
                <td>${item.costPerMeter.toFixed(2)}円/m</td>
                <td><button class="delete-button" data-id="${item.id}"><i class="las la-trash"></i></button></td>
            `;
            tableBody.appendChild(row);
        });

        // 削除ボタンのイベントを設定
        document.querySelectorAll(".delete-button").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                const id = btn.getAttribute("data-id");
                items = items.filter((item) => String(item.id) !== id);
                renderTable();
            });
        });
    }

    function generateId() {
        return nextId++;
    }
});