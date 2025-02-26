import { ADD_ALL_COMPLETE_TASKS, ADD_ALL_TASKS, ADD_TASK, COMPLETE_TASK, INCOMPLETE_TASK, REM_TASK, UPDATE_BULK_OPTIONS, UPDATE_TASK } from "./actionTypes"

export function addTask(task) {
    return (
        {
            type: ADD_TASK,
            payload: task
        }
    )
} 

export function remTask(task_id) {
    return (
        {
            type: REM_TASK,
            payload: task_id
        }
    )
} 

export function addAllTask(task_array) {
    return (
        {
            type: ADD_ALL_TASKS,
            payload: task_array
        }
    )
} 

export function updateTask(task_array) {
    return (
        {
            type: UPDATE_TASK,
            payload: task_array
        }
    )
} 

export function completeTask(task_id) {
    return (
        {
            type: COMPLETE_TASK,
            payload: task_id
        }
    )
} 

export function incompleteTask(task_id) {
    return (
        {
            type: INCOMPLETE_TASK,
            payload: task_id
        }
    )
} 

export function addAllCompleteTasks(task_array) {
    return (
        {
            type: ADD_ALL_COMPLETE_TASKS,
            payload: task_array
        }
    )
} 

export function updateBulkOptions(options) {
    return (
        {
            type: UPDATE_BULK_OPTIONS,
            payload: options
        }
    )
} 
