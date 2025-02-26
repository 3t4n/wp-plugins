import { ADD_ALL_TASKS, ADD_TASK, REM_TASK, UPDATE_TASK } from '../actionCreators/actionTypes';

let initState = [];

export default function taskReducer(state = initState, action) {
    if(action.type === ADD_TASK) {
        let temp = state.map((task) => {
            return {...task}
        }) 
        return (
            [action.payload, ...temp]
        )
    } else if(action.type === REM_TASK) {
        let temp = state.map((task) => {
            return {...task}
        })
        return (
            temp.filter((task) => {
                return task.task_id != action.payload;
            })
        )
    } else if(action.type === ADD_ALL_TASKS) {
        return action.payload.map((task) => {
            return {...task, isSelected: false}
        })
    } else if(action.type === UPDATE_TASK) {
        const updatedTasks = state.map((task) => {
            if(task.task_id === action.payload.task_id) {
                return action.payload
            } else {
                return {...task}
            }
        }) 
        return updatedTasks;
    }

    return state;
}