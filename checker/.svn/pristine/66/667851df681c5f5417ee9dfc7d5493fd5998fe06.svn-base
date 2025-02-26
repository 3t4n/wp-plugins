// EventHandlers.js
import axios from "axios";
import store from '../state/store';
import { updateBulkOptions, updateTask } from "../state/actionCreators";

class EventHandlers {
    static isSelectAll = false;

    static findTask = (task_id) => {
        return store.getState().task.filter(taskItem => {
            return taskItem.task_id === task_id;
        })[0];
    }

    // Function to handle the click event on a task item
    static handleOnClick (e, task_id) {
        if( store.getState().bulkOptions.isBulkSelect ) {

            const prevData = EventHandlers.findTask(task_id);
            let updatedTask = {
                ...prevData
            };
            updatedTask['isSelected'] = !prevData.isSelected;
            store.dispatch(updateTask(updatedTask))
        }
    };

    static handleBulkSelectClick(e) {

        if(store.getState().bulkOptions.isBulkSelect){
            store.getState().task.map((taskItem) => {
                let updatedTask = {
                    ...taskItem
                };
                updatedTask['isSelected'] = false;
                store.dispatch(updateTask(updatedTask))
            })
        }

        let isBulkSelect = store.getState().bulkOptions.isBulkSelect;
        let isSelectAll = store.getState().bulkOptions.isSelectAll;
        store.dispatch(updateBulkOptions({
            isBulkSelect: !isBulkSelect,
            isSelectAll: isSelectAll
        }))

    }

    static handleCheckClick(e) {
        if(store.getState().bulkOptions.isBulkSelect){
            store.getState().task.map((taskItem) => {
                let updatedTask = {
                    ...taskItem
                };
                updatedTask['isSelected'] = !taskItem.isSelected;
                store.dispatch(updateTask(updatedTask))
            })
        }
    }
  
  
    static handleDownloadClick() {
        if(store.getState().bulkOptions.isBulkSelect){
            const taskItems = document.querySelectorAll('.chkr-task-item.chkr-selected');
        
            let taskIds = [];
            for(let i = 0; i < taskItems.length; i++) {
                const task = taskItems[i];
                const taskId = task.getAttribute('data-task-id');
                taskIds.push(taskId);
            }
        
            if(taskItems.length < 0){
                alert('No items selected')
            }
            else{

                async function getAllTasks() {
                    for (let index = 0; index < taskIds.length; index++) {
                        const taskId = taskIds[index];
                        
                        try {
                            const response = await axios.get(`${store.getState().url}/wp-json/checker/v1/chkr_task/get/?task_id=${taskId}`, {
                                headers: {
                                    'X-WP-Nonce': wpApiSettings.nonce,
                                }
                            });
                            allTasks.push(response.data.task)
                        } catch (error) {
                            console.error('Error fetching task:', error);
                        }
                    }
                }
                
                let allTasks = []
                getAllTasks(taskItems).then(() => {
                    const taskItems = document.querySelectorAll('.chkr-task-item');
                    taskItems.forEach((taskItem) => {
                    taskItem.classList.remove('chkr-selected');
                    });

                    // download
                    const url = window.URL.createObjectURL(new Blob([JSON.stringify(allTasks)]));
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'data.json';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                }); 
            }
        }
    }
  
    static handlePriorityClick() {
        if(store.getState().bulkOptions.isBulkSelect){
            const target_div = document.getElementsByClassName('chkr-priority-list')[0];
            if(target_div.style.display == 'flex') {
                target_div.style.display = 'none';
            } else {
                target_div.style.display = 'flex';
            }
        }
    }

    static handlePriorityChange(e, priority, updateTask) {
        const taskItems = document.querySelectorAll('.chkr-selected');
        let taskIds = [];
        for(let i = 0; i < taskItems.length; i++) {
            const task = taskItems[i];
            const taskId = task.getAttribute('data-task-id');
            taskIds.push(taskId);
        }

      if(taskItems.length < 0){
        alert('No items selected')
      }
      else{

        let status = true;
        let index = 0;
        
        function changePriorityNext() {
        if (index < taskIds.length && status) {
            const taskId = taskIds[index];
            const requestBody = {
                task_id: taskId,
                task_priority: priority
            };
        
            axios.post(`${store.getState().url}/wp-json/checker/v1/chkr_task/update/`, requestBody, {
                headers: {
                    'X-WP-Nonce': wpApiSettings.nonce,
                }
            })
            .then((response) => {

                if (response.data.error) {
                    console.log(response.data.error);
                } else {
                    const prevData = store.getState().task.filter(taskItem => {
                        return taskItem.task_id === parseInt(taskId);
                    })[0];
    
                    let updatedTask = {
                        ...prevData,
                        task_priority: priority
                    };
                    
                    updateTask(updatedTask);
                    
                    // Move to the next task
                    index++;
                    changePriorityNext();
            }
                
            })
            .catch((error) => {
                console.error('Error updating task:', error);
            });
        }
        }
        
        changePriorityNext();

        // hide priority list
        const target_div = document.getElementsByClassName('chkr-priority-list')[0];
        target_div.style.display = 'none';

        // remove bulk select
        const taskItems = document.querySelectorAll('.chkr-task-item');
        taskItems.forEach((taskItem) => {
          taskItem.classList.remove('chkr-selected');
        }); 
      }
    }
  
    static handleDeleteClick(e, remTask, remCompleteTasks) {
 
      const taskItems = document.querySelectorAll('.chkr-task-item.chkr-selected');
      
      let taskIds = [];
      for(let i = 0; i < taskItems.length; i++) {
        const task = taskItems[i];
        const taskId = task.getAttribute('data-task-id');
        taskIds.push(taskId);
      }
      
      if(taskItems.length < 0){
        alert('No items selected')
      }
      else{
        
        let status = true;
        let index = 0;
        
        function deleteNextTask() {
          if (index < taskIds.length && status) {
            const taskId = taskIds[index];
        
            axios.delete(`${store.getState().url}/wp-json/checker/v1/chkr_task/delete/${taskId}`, {
                headers: {
                    'X-WP-Nonce': wpApiSettings.nonce,
                }
            })
              .then((response) => {
                // Handle the response
                console.log('Task deleted:', response);
                remTask(taskId);
                remCompleteTasks(taskId);
        
                // Move to the next task
                index++;
                deleteNextTask();
              })
              .catch((error) => {
                console.error('Error deleting task:', error);
              });
          }
        }
        
        deleteNextTask();
        
       
        const taskItems = document.querySelectorAll('.chkr-task-item');

        taskItems.forEach((taskItem) => {
          taskItem.classList.remove('chkr-selected');
        });
        
        
      }
    }
  
  }
  
  export default EventHandlers;
  