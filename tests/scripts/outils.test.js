QUnit.module("[Outils]: DOM Selectors", function() {
    QUnit.test('_id()', function(assert) {
        let DOM_id = `<div id="MonIdDeTest"></div>`;
        let container = document.getElementById('container');
        container.innerHTML = DOM_id;

        // Tester avec une valeur valide
        assert.ok(_id("MonIdDeTest"), 'il existe');

        // Tester avec une valeur invalide
        assert.notOk(_id("MonIdDeTestFalse"), 'il existe pas');
    });
    QUnit.test('_tn()', function(assert) {
        let DOM_tn = `<p></p>`;
        let container = document.getElementById('container');
        container.innerHTML = DOM_tn;

        // Tester avec une valeur valide
        assert.ok(_tn("p"), 'il existe');

        // Tester avec une valeur invalide
        assert.equal(_tn("aside").length, 0, 'il existe pas');
    });
    QUnit.test('_n()', function(assert) {
        let DOM_n = `<input name="fname" type="text" value="Michael"></p>`;
        let container = document.getElementById('container');
        container.innerHTML = DOM_n;

        // Tester avec une valeur valide
        assert.ok(_n("fname"), 'il existe');

        // Tester avec une valeur invalide
        assert.equal(_n("nfname").length, 0, 'il existe pas');
    });
    QUnit.test('_cn()', function(assert) {
        let DOM_cn = `<div class="example_color"></div>`;
        let container = document.getElementById('container');
        container.innerHTML = DOM_cn;

        // Tester avec une valeur valide
        assert.ok(_cn("example_color"), 'il existe');

        // Tester avec une valeur invalide
        assert.equal(_cn("exemple_false").length, 0, 'il existe pas');

    });
});