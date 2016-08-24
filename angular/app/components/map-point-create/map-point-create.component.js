class MapPointCreateController{
    constructor(API,leafletData,$scope) {
        'ngInject';
        this.API = API
        this.errors = []
        this.alerts = []
        this.select_cat = []
        this.select_icon = []
        this.select_level_icon = []
        this.select_level_title = []
        let created_marker = {}
        this.events = {markers:{enable: [ 'dragend' ]}}
        this.API.all('category').getList().then((response)=>{
            this.select_cat = response
        })

        this.API.all('levels').getList().then((response)=>{
            this.select_level_icon = response
        })
        this.API.all('levels').getList().then((response)=>{
            this.select_level_title = response
        })
        this.defaults = {
                tileLayer: "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
                maxZoom: 14,
                path: {weight: 10,color: '#800000',opacity: 1}
            }
        this.center = {lat: 51.505,lng: -0.09,zoom: 8}
        this.markers = new Array()
        $scope.$on("leafletDirectiveMap.click" , (event, args) => {           
            let leafEvent = args.leafletEvent
            this.lat = leafEvent.latlng.lat
            this.long = leafEvent.latlng.lng
            created_marker = {
                    lat: leafEvent.latlng.lat,
                    lng: leafEvent.latlng.lng,
                    message: "الرجاء اختيار مكانك",
                    draggable: true,
                    focus: true
                }
            this.markers = new Array(created_marker)
        })
        $scope.$on("leafletDirectiveMarker.dragend",(event, args)=>{
            this.lat = args.model.lat
            this.long = args.model.lng
        })
    }
    refresh_points(){
        this.select_icon = []
        this.API.one('iconcat',this.cat_id).getList().then((response)=>{
            this.select_icon = response
        })
    }
    submit(){
        let title_level = (this.title_level_id)? this.title_level_id : this.icon_level_id
        let obj = {
            title : this.title ,
            description : this.description ,
            lat : this.lat,
            long : this.long,
            icon_id : this.icon_id,
            cat_id : this.cat_id,
            title_level_id : title_level,
            icon_level_id : this.icon_level_id
        }
        this.API.all('points').post(obj).then(() => {
            this.alerts = []
            this.errors = []
            this.alerts.push({ type: 'success', 'title': 'Success!', msg: 'Level has been added.' })
        } , (res) => {
            this.alerts = []
            this.alerts.push({ type: 'error', 'title': 'Error!', msg: res.data.message })
            this.errors = res.data.errors
        })
    }
}





export const MapPointCreateComponent = {
    templateUrl: './views/app/components/map-point-create/map-point-create.component.html',
    controller: MapPointCreateController,
    controllerAs: 'vm',
    bindings: {}
}


