class MapIconListController{
    constructor(API){
        'ngInject';
        this.API = API
    }

    $onInit(){

    }
}

export const MapIconListComponent = {
    templateUrl: './views/app/components/map_icon_list/map_icon_list.component.html',
    controller: MapIconListController,
    controllerAs: 'vm',
    bindings: {}
}
