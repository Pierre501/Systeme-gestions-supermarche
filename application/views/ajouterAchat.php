<div class="col-md-12">
  <h1>Validtion d'achat</h1>
    <table class="table table-bordered table-hover">
      <tr>
        <th>Produit</th>
        <th>Prix Unitaire</th>
        <th>Quantité</th>
        <th>Montant</th>
      </tr>
      <?php for($i = 0; $i < count($designation); $i++) { ?>
        <tr>
          <td align="center"><?php echo $designation[$i]; ?></td>
          <td align="center"><?php echo $prixUnitaire[$i]; ?></td>
          <td align="center"><?php echo $quantite[$i]; ?></td>
          <td align="center"><?php echo $prixTotal[$i]; ?></td>
        </tr>
      <?php } ?>
      <tr>
        <td></td>
        <td></td>
        <td><b>Total</b></td>
        <td align="center"><?php echo $sommeMontant; ?></td>
      </tr>
    </table>
</div>