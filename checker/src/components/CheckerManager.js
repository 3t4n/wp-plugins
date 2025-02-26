import React, { Component } from 'react';
import TaskContainer from './TaskContainer';
import ToolButton from './ToolButton';
import Button from './Button';
import TaskPopup from './TaskPopup';
import FilterList from './FilterList';
import EventHandlers from './EventHandlers';
import { connect} from 'react-redux';
import { addAllCompleteTasks, addAllTask, remTask, incompleteTask, updateTask } from '../state/actionCreators';
import axios from 'axios';
import ImportPopup from './ImportPopup';

class CheckerManager extends Component {
    constructor(props) {
        super();
        this.state = {
            addPopup: React.createRef(),
            importPopup: React.createRef(), 
            sorted: false,
            overlay: false,
            isFilterListOpen: false,
            isFiltersApplied: false,
        };
    }

    componentDidMount() {
        this.getAllTasks();
    }

    getAllTasks = () => {
        // let chkr_nonce = encodeURIComponent(document.querySelector('#chkr-checklist-manager').getAttribute('wp-nonce'));
        axios.get(this.props.url + `/wp-json/checker/v1/chkr_task/getAll/`, {
            headers: {
                'X-WP-Nonce': wpApiSettings.nonce,
            }
        })
        .then((response) => {
            if (response.data.error) {
                console.log(response.data.error);
            } else {
                this.props.add_all_tasks(response.data.tasks)
                this.props.add_all_complete_tasks(response.data.completed_tasks)
            }
        })
        .catch((error) => {
            console.error('Error fetching tasks:', error);
        });
    }

    displayOverlay = () => {
        this.setState((prevState) => {
            return({
                ...prevState,
                overlay: true
            })
        })
    }

    hideOverlay = () => {
        this.setState((prevState) => {
            return({
                ...prevState,
                overlay: false
            })
        })
    }

    openFilterList = () => {
        let {isFilterListOpen} = this.state;
        if(isFilterListOpen){
            this.closeFilterList();
        }
        else{
            this.setState({isFilterListOpen: true})
        }
    }

    closeFilterList = () => {
        this.setState({isFilterListOpen: false})
    }

    applyFilters = () => {
        this.setState({ isFiltersApplied: true });

    }

    removeFilters = () => {
        this.getAllTasks();
        this.setState({ isFiltersApplied: false });
        this.closeFilterList();

    }


    openImportTasksPopup = ()=> { 
        this.displayOverlay()
        this.state.importPopup.current.openPopup();
    }

    
    openAddPopup = () => {
        
        this.displayOverlay()
        this.state.addPopup.current.openPopup();
    }

    render() {

        const {isPopupOpen } = this.state;
        let progress_width;
        if(this.props.task.length < 1){
            progress_width = 0;
        }
        else{
            progress_width = (this.props.complete_tasks.length / this.props.task.length) * 100;
        }
        
        return (
            <>
                <h1 className='chkr-header'>CHECKER MANAGER</h1>
                <div id='chkr-overlay' className={this.state.overlay ? 'chkr-body-popup-bg' : ''}></div>
                <div id = "chkr-menu">
                    <Button name= "Add Task" eventHandler={this.openAddPopup}/>

                    <div id = 'chkr-toolbar'>
                        <ToolButton className={this.props.bulk_options.isBulkSelect ? 'chkr-btn-selected' : ''} name="Bulk-Select" icon="fas fa-solid fa-check-double" eventHandler={(e) => EventHandlers.handleBulkSelectClick(e)} />
                        <ToolButton className={this.props.bulk_options.isBulkSelect ? '' : 'chkr-hidden'} name="Select-All" icon="fas fa-check-square" eventHandler={EventHandlers.handleCheckClick} />
                        <ToolButton className={this.props.bulk_options.isBulkSelect ? '' : 'chkr-hidden'} name="Download" icon="fas fa-file-download" eventHandler={EventHandlers.handleDownloadClick} />
                        <ToolButton className={this.props.bulk_options.isBulkSelect ? '' : 'chkr-hidden'} name="Delete" icon="fas fa-trash" eventHandler={(e) => EventHandlers.handleDeleteClick(e, this.props.rem_task, this.props.rem_completed_tasks)} />
                        <div className="chkr-changepriority-wrapper">
                            <ToolButton className={this.props.bulk_options.isBulkSelect ? '' : 'chkr-hidden'} name="Priority" icon="fas fa-solid fa-star" eventHandler={EventHandlers.handlePriorityClick} />
                            <div className="chkr-priority-list chkr-hidden">
                                <div onClick={(e) => {EventHandlers.handlePriorityChange(e, 'low', this.props.update_task)}} className="chkr-priority-item" value='low'>Low</div>
                                <div onClick={(e) => {EventHandlers.handlePriorityChange(e, 'medium', this.props.update_task)}} className="chkr-priority-item" value='medium'>Medium</div>
                                <div onClick={(e) => {EventHandlers.handlePriorityChange(e, 'high', this.props.update_task)}} className="chkr-priority-item" value='high'>High</div>
                            </div>
                        </div>
                    </div>
                    <Button name="Filter" eventHandler={this.openFilterList} styleClass={`${this.state.isFiltersApplied ? 'chkr-btn-highlight' : ''}`}/>
                    <Button name="Import" eventHandler={this.openImportTasksPopup}/>
                    <FilterList 
                        isFiltersApplied={this.state.isFiltersApplied} 
                        isFilterListOpen={this.state.isFilterListOpen} 
                        closeFilterList={this.closeFilterList}
                        applyFilters={this.applyFilters}
                        removeFilters={this.removeFilters}
                    />

                </div>
                <div id="chkr-checker-list">
                    <TaskContainer  getAllTasks={this.getAllTasks} isFiltersApplied={this.state.isFiltersApplied} />
                    <TaskPopup onClose={this.hideOverlay} ref={this.state.addPopup}/>
                    <ImportPopup onClose={this.hideOverlay} ref={this.state.importPopup}/>
                </div>
                <div id="chkr-progress-bar-wrapper">
                    <span style={{ fontWeight: '700' }}>Progress</span>
                    <div id="chkr-progress-container">
                        <div id="chkr-progress-bar" style={{ width: progress_width + '%' }}>
                        {progress_width % 1 !== 0 ? `${progress_width.toFixed(2)}%` : `${progress_width}%`}
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return (
        {
            task: state.task,
            complete_tasks: state.completedTasks,
            url: state.url,
            bulk_options: state.bulkOptions
        }
    )
}

const mapDispatchToProps = (dispatch) => {
    return (
        {
            rem_task: (id) => {dispatch(remTask(id))},
            rem_completed_tasks: (id) => {dispatch(incompleteTask(id))},
            add_all_tasks: (arr)=> {dispatch(addAllTask(arr))},
            add_all_complete_tasks: (arr)=> {dispatch(addAllCompleteTasks(arr))},
            update_task: (arr)=> {dispatch(updateTask(arr))},
        }
    )
}

export default connect(mapStateToProps,mapDispatchToProps )(CheckerManager);
