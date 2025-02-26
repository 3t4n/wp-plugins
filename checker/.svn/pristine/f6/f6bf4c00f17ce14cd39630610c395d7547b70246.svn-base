import { UPDATE_BULK_OPTIONS } from "../actionCreators/actionTypes";

let initState = {
    isBulkSelect: false,
    isSelectAll: false
}

export default function BulkOptionsReducer(state = initState, action) {
  
    if(action.type === UPDATE_BULK_OPTIONS) {
        return {...action.payload};
    } else {
        return state;
    }
}