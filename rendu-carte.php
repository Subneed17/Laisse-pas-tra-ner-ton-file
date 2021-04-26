<div class="rendu carte">
    <div class="carte">
        <div class="photo identite">
            <img class="gd" src"
                <?php
                if (!empty($uploadFile)) {
                    echo $uploadFile;
                }
                ?>" />
        </div>
        <div class="Intitule">
            <div class="group">
                <h1>Mystère Et</h1>
                <h1>Compagnie</h1>
            </div>
            <div class="personnage">
                <div class="identite">
                    <p>
                        <?php
                        if (!empty($identity['name'])) {
                            echo $identity['name'];
                        }
                        ?></br>
                    </p>
                    <p>
                        <?php
                        if (!empty($identity['adress'])) {
                            echo $identity['adress'];
                        }
                        ?></br>
                    </p>
                    <p>
                        <?php
                        if (!empty($identity['ville'])) {
                            echo $identity['cp'] . " " . $identity['ville'];
                        }
                        ?></br>
                    </p>
                </div>
                <div class="sex">
                    <p>Sexe:
                        <?php
                        if (!empty($identity['sex'])) {
                            echo $identity['sex'];
                        }
                        ?>
                    </p>
                    <p class="signature">
                        <?php
                        if (!empty($identity['name'])) {
                            echo $identity['name'];
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>