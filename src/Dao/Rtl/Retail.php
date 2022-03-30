<?php
namespace Dao\Rtl;

use Dao\Table;

class Retail extends Table{

    public static function obtenerCatalogoProductos()
    {
        $sqlstr = "select z.invPrdId, z.invPrdCodInt, z.invPrdDsc, z.invPrdPrcVnt, z.stock, sum(z.cartCtd) as cartCtd , z.stock - sum(z.cartCtd) as StockDisp
from (
select a.invPrdId, a.invPrdCodInt, a.invPrdDsc, a.invPrdPrcVnt, b.stock,  ifnull(d.cartCtd, 0) as cartCtd from
	productos a
    left join almacenes_productos b on a.invPrdId = b.invPrdId
    left join carretilla_anon d on a.invPrdId = d.invPrdId and d.cartIat >= now()
where a.invPrdEst='ACT'
union all
select a.invPrdId, a.invPrdCodInt, a.invPrdDsc, a.invPrdPrcVnt, b.stock,  ifnull(e.cartCtd, 0) as cartCtd from
	productos a
    left join almacenes_productos b on a.invPrdId = b.invPrdId
    left join carretilla_auth e on a.invPrdId = e.invPrdId and e.cartIat >= now()
where a.invPrdEst='ACT' ) as z
group by  z.invPrdId, z.invPrdCodInt, z.invPrdDsc, z.invPrdPrcVnt, z.stock
;";
        return self::obtenerRegistros($sqlstr, []);
    }
}

?>
