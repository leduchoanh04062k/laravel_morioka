<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog" aria-hidden="true"></i>
        Thao tác
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow: hidden;">
        <!-- Button dropdown1 -->
        <button type="button"  onClick="detailFunc({{ $id }})" class="btn btn-primary dropdown-item pd-l-15" data-toggle="modal"
            data-target="#dropdown1">
            <i class="fa fa-eye" aria-hidden="true"></i>
            Chi tiết phiếu
        </button>
        <!-- Button dropdown2 -->
        <button type="button" class="btn btn-primary dropdown-item pd-l-15" id="nutThaoTacSua">
            <i class="fa fa-print" aria-hidden="true"></i>
            In phiếu
        </button>
    </div>

</div>
