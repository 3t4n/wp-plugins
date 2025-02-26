import { ADD_ALL_COMPLETE_TASKS, COMPLETE_TASK, INCOMPLETE_TASK } from '../actionCreators/actionTypes';

let initState = [];

export default function completeTaskReducer(state = initState, action) {
    if(action.type === COMPLETE_TASK) {
        return (
            [action.payload, ...state]
        )
    } else if(action.type === INCOMPLETE_TASK) {
        return (
            state.filter((task) => {
                return task!= action.payload;
            })
        )
    } else if(action.type === ADD_ALL_COMPLETE_TASKS) {
        return (
            [...action.payload]
        )
    }

    return state;
}