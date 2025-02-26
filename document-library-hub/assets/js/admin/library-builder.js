import React, { useState, useEffect } from 'react';
import { createRoot } from 'react-dom/client';
import { DragDropContext, Droppable, Draggable } from 'react-beautiful-dnd';
import Select from 'react-select'
import { __ } from '@wordpress/i18n';

const LibraryBuilder = () => {
    // If this is an edited library, this will hold the settings from the database
    const LibraryData = window.dlhpLibraryData;

    let initialContent = []; // Default to an empty array

    if (typeof LibraryData === 'object' && LibraryData !== null) {
        // Check if LibraryData is an object and not null
        if (Array.isArray(LibraryData)) {
            // Case when LibraryData is an empty array
            initialContent = [];
        } else if (LibraryData.content) {
            // Case when LibraryData is an object with content
            initialContent = Object.entries(LibraryData.content).map(([key, value]) => ({
                type: key,
                settings: value.settings,
            }));
        }
    }

    const [librarySettingsData, setLibrarySettingsData] = useState({
        includeCategories: LibraryData?.settings?.includeCategories || [],
        foldersLayout: LibraryData?.settings?.foldersLayout || 'none',
        documentsLayout: LibraryData?.settings?.documentsLayout || 'grid',
        gridDesktopColumns: LibraryData?.settings?.gridDesktopColumns || 3,
        gridTabletColumns: LibraryData?.settings?.gridTabletColumns || 2,
        gridMobileColumns: LibraryData?.settings?.gridMobileColumns || 1,
        gridGap: LibraryData?.settings?.gridGap || 10,
        centerContent: LibraryData?.settings?.centerContent !== undefined ? LibraryData.settings.centerContent : false,
        removeBorder: LibraryData?.settings?.removeBorder !== undefined ? LibraryData.settings.removeBorder : false,
        backgroundColor: LibraryData?.settings?.backgroundColor || '',
        titleSize: LibraryData?.settings?.titleSize || '',
        useIcon: LibraryData?.settings?.useIcon !== undefined ? LibraryData.settings.useIcon : false,
        sort: LibraryData?.settings?.sort || 'date',
        order: LibraryData?.settings?.order || 'asc',
        perPage: LibraryData?.settings?.perPage || 10,
        tableDisplayLimit: LibraryData?.settings?.tableDisplayLimit || 200,
        pagination: LibraryData?.settings?.pagination !== undefined ? LibraryData.settings.pagination : false,
        enableSearch: LibraryData?.settings?.enableSearch !== undefined ? LibraryData.settings.enableSearch : true,
    });

    const [libraryContentData, setLibraryContentData] = useState(initialContent);
    const standardContent = ["image", "title", "excerpt", "content", "author", "date", "categories", "tags", "fileSize", "fileType", "button"];
    const [disabledContent, setDisabledContent] = useState({});
    const [customFieldCount, setCustomFieldCount] = useState(0);
    const [categoryOptions, setCategoryOptions] = useState([]);

    const handleSettingsChange = (e) => {
        const { name, value } = e.target;
    
        setLibrarySettingsData((prevSettings) => {
            return {
                ...prevSettings,
                [name]: value,
            };
        });
    };

    const handleMultiSelectChange = (selectedOptions) => {
        const selectedValues = selectedOptions ? selectedOptions.map(option => option.value) : [];
        setLibrarySettingsData((prevSettings) => ({
            ...prevSettings,
            includeCategories: selectedValues,
        }));
    };

    const addElement = (type) => {
        const updatedData = [...libraryContentData];
    
        if (type === 'customField') {
            // Increment the custom field count and create a unique identifier
            const uniqueCustomFieldId = `customField${customFieldCount}`;
            updatedData.push({ type: uniqueCustomFieldId, settings: {} });
            setCustomFieldCount(customFieldCount + 1); // Update count
        } else {
            // Set clickable to "none" or a type-specific default
            let clickableDefault;
        
            switch (type) {
                case 'button':
                case 'image':
                case 'title':
                    clickableDefault = "document_post";
                    break;
                case 'author':
                    clickableDefault = "author_posts";
                    break;
                default:
                    clickableDefault = "none";
            }
        
            updatedData.push({ type, settings: { clickable: clickableDefault } });
        }
    
        setLibraryContentData(updatedData);
    
        if (standardContent.includes(type)) {
            setDisabledContent(prevState => ({ ...prevState, [type]: true }));
        }
    };

    const removeElement = (index) => {
        const type = libraryContentData[index].type;
        const updatedData = libraryContentData.filter((_, i) => i !== index);
        setLibraryContentData(updatedData);

        if (standardContent.includes(type)) {
            setDisabledContent(prevState => ({ ...prevState, [type]: false }));
        }
    };

    useEffect(() => {
        const libraryContentDataInput = document.getElementById('dlhp-library-data');
        if (libraryContentDataInput) {
            const contentData = {};
            libraryContentData.forEach(item => {
                contentData[item.type] = { settings: item.settings };
            });

            const finalData = {
                content: {
                    ...contentData,
                },
                settings: librarySettingsData
            };

            libraryContentDataInput.value = JSON.stringify(finalData, null, 4);
        }
    }, [libraryContentData, librarySettingsData]);

    // Fetch categories from window.LibraryBuilderData and set them in state
    useEffect(() => {
        if (window.LibraryBuilderData && window.LibraryBuilderData.categories) {
            const categories = window.LibraryBuilderData.categories;

            const categoryOptions = categories.map(category => ({
                value: category.id,
                label: category.name
            }));
            setCategoryOptions(categoryOptions);
        }
    }, []);

    // Separate useEffect for initializing disabled content
    useEffect(() => {
        const initialDisabled = {};
        initialContent.forEach(item => {
            initialDisabled[item.type] = true; // Disable buttons for types in initialContent
        });
        setDisabledContent(initialDisabled);
    }, []);

    return (
        <div className='dlhp-wrapper'>
            <div className='dlhp-content'>
                <h3>{__( 'Content', 'document-library-hub' )}</h3>

                <div className='dlhp-content-buttons'>
                    {standardContent.map(content => (
                        <button
                            key={content}
                            type="button"
                            onClick={() => addElement(content)}
                            disabled={disabledContent[content]}
                        >
                            {content.charAt(0).toUpperCase() + content.slice(1)}
                        </button>
                    ))}
                    <button type="button" onClick={() => addElement("customField")}>
                        {__( 'Custom Field', 'document-library-hub' )}
                    </button>
                </div>

                <DragDropContext
                    onDragEnd={(result) => {
                        const { destination, source } = result;
                        if (!destination) return;

                        const reorderedData = Array.from(libraryContentData);
                        const [movedItem] = reorderedData.splice(source.index, 1);
                        reorderedData.splice(destination.index, 0, movedItem);
                        setLibraryContentData(reorderedData);
                    }}
                >
                    <Droppable droppableId="libraryContentData">
                        {(provided) => (
                            <div {...provided.droppableProps} ref={provided.innerRef}>
                                {libraryContentData.map((element, index) => (
                                    <Draggable key={index} draggableId={index.toString()} index={index}>
                                        {(provided) => (
                                            <div
                                                ref={provided.innerRef}
                                                {...provided.draggableProps}
                                                {...provided.dragHandleProps}
                                            >
                                                <div className='dlhp-dragged-item'>
                                                    <div className='dlhp-dragged-item-flex'>
                                                        {element.type.startsWith('customField') ? (
                                                            <div className='dlhp-dragged-item-name'>
                                                                <svg className="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" strokeLinecap="round" strokeWidth="2" d="M5 7h14M5 12h14M5 17h14"/>
                                                                </svg>
                                                                {__( 'Custom Field', 'document-library-hub' )}
                                                            </div>
                                                        ) : (
                                                            <div className='dlhp-dragged-item-name'>
                                                                <svg className="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" strokeLinecap="round" strokeWidth="2" d="M5 7h14M5 12h14M5 17h14"/>
                                                                </svg>
                                                        
                                                                {element.type.charAt(0).toUpperCase() + element.type.slice(1)}
                                                            </div>
                                                        )}
                                                        <div className='dlhp-dragged-item-settings'>
                                                            <svg onClick={() => removeElement(index)} className="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                            </svg>
                                                        </div>
                                                    </div>

                                                    {/* Table Column Name - Only when table layout is selected */}
                                                    {librarySettingsData.documentsLayout === "table" ? (
                                                        <div>
                                                            <label>
                                                                {__('Table Column Name: ', 'document-library-hub')}
                                                                <input 
                                                                    type="text" 
                                                                    value={element.settings.tableColumnName || ''} 
                                                                    onChange={(e) => {
                                                                        const value = e.target.value.trim();
                                                                        const newSettings = { 
                                                                            ...element.settings, 
                                                                            tableColumnName: value || '-'
                                                                        };
                                                                        const updatedLibraryContentData = [...libraryContentData];
                                                                        updatedLibraryContentData[index].settings = newSettings;
                                                                        setLibraryContentData(updatedLibraryContentData);
                                                                    }} 
                                                                />
                                                            </label>
                                                        </div>
                                                    ) : null}

                                                    {/* Link setting */}
                                                    {element.type === 'image' || element.type === 'title' ? (
                                                        <div>
                                                        <label>
                                                        {__( 'Link To: ', 'document-library-hub' )} 
                                                            <select 
                                                                style={{ marginLeft: '4px' }} 
                                                                value={element.settings.clickable || "document_post"}  // default value
                                                                onChange={(e) => {
                                                                    const newSettings = { ...element.settings, clickable: e.target.value };
                                                                    const updatedLibraryContentData = [...libraryContentData];
                                                                    updatedLibraryContentData[index].settings = newSettings;
                                                                    setLibraryContentData(updatedLibraryContentData);
                                                                }}
                                                            >
                                                                <option value="document_post">{__( 'Document Post', 'document-library-hub' )}</option>
                                                                <option value="none">{__( 'None', 'document-library-hub' )}</option>
                                                                <option value="file_url">{__( 'File', 'document-library-hub' )}</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    ) : null}

                                                    {/* Image setting */}
                                                    {element.type === 'image' ? (
                                                        <div>
                                                        <label>
                                                            <input 
                                                                type="checkbox" 
                                                                checked={Boolean(element.settings.useIcon)}
                                                                onChange={(e) => {
                                                                    const newSettings = { ...element.settings, useIcon: e.target.checked ? 1 : 0 };
                                                                    const updatedLibraryContentData = [...libraryContentData];
                                                                    updatedLibraryContentData[index].settings = newSettings;
                                                                    setLibraryContentData(updatedLibraryContentData);
                                                                }} 
                                                            />
                                                            {__( 'Replace image with file icon', 'document-library-hub' )}
                                                        </label>
                                                    </div>
                                                    ) : null}

                                                    {/* Author setting */}
                                                    {element.type === 'author' ? (
                                                        <div>
                                                            <label>
                                                                {__( 'Link To: ', 'document-library-hub' )}
                                                                <select 
                                                                    style={{ marginLeft: '4px' }}
                                                                    value={element.settings.clickable || "author_posts"}  // default value
                                                                    onChange={(e) => {
                                                                        const newSettings = { ...element.settings, clickable: e.target.value };
                                                                        const updatedLibraryContentData = [...libraryContentData];
                                                                        updatedLibraryContentData[index].settings = newSettings;
                                                                        setLibraryContentData(updatedLibraryContentData);
                                                                    }}
                                                                >
                                                                    <option value="author_posts">{__( 'Author Posts', 'document-library-hub' )}</option>
                                                                    <option value="none">{__( 'None', 'document-library-hub' )}</option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    ) : null}

                                                    {/* Button link setting */}
                                                    {element.type === 'button' ? (
                                                        <div>
                                                            <label>
                                                                {__( 'Link To: ', 'document-library-hub' )}    
                                                                <select 
                                                                    style={{ marginLeft: '4px' }}
                                                                    value={element.settings.clickable || "document_post"}  // default value
                                                                    onChange={(e) => {
                                                                        const newSettings = { ...element.settings, clickable: e.target.value };
                                                                        const updatedLibraryContentData = [...libraryContentData];
                                                                        updatedLibraryContentData[index].settings = newSettings;
                                                                        setLibraryContentData(updatedLibraryContentData);
                                                                    }}
                                                                >
                                                                    <option value="document_post">{__( 'Document Post', 'document-library-hub' )}</option>
                                                                    <option value="file_url">{__( 'File', 'document-library-hub' )}</option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    ) : null}

                                                    {/* Limit setting */}
                                                    {element.type === 'excerpt' ? (
                                                        <div>
                                                            <label>
                                                                {__( 'Limit: ', 'document-library-hub' )}
                                                                <input 
                                                                    type="number" 
                                                                    value={element.settings.limit || ''} 
                                                                    onChange={(e) => {
                                                                        const newSettings = { ...element.settings, limit: parseInt(e.target.value, 10) || 0 };
                                                                        const updatedLibraryContentData = [...libraryContentData];
                                                                        updatedLibraryContentData[index].settings = newSettings;
                                                                        setLibraryContentData(updatedLibraryContentData);
                                                                    }}
                                                                    className="dlhp-small-input"
                                                                    min="1"
                                                                />
                                                            </label>
                                                        </div>
                                                    ) : null}

                                                    {/* Text setting for custom fields */}
                                                    {element.type.startsWith('customField') ? (
                                                        <div>
                                                            <label>
                                                                {__( 'Field Name: ', 'document-library-hub' )}   
                                                                <input 
                                                                    style={{ marginLeft: '4px' }}
                                                                    type="text" 
                                                                    value={element.settings.customFieldName || ''} 
                                                                    onChange={(e) => {
                                                                        const newSettings = { ...element.settings, customFieldName: e.target.value };
                                                                        const updatedLibraryContentData = [...libraryContentData];
                                                                        updatedLibraryContentData[index].settings = newSettings;
                                                                        setLibraryContentData(updatedLibraryContentData);
                                                                    }} 
                                                                />
                                                            </label>
                                                        </div>
                                                    ) : null}
                                                </div>
                                            </div>
                                        )}
                                    </Draggable>
                                ))}
                                {provided.placeholder}
                            </div>
                        )}
                    </Droppable>
                </DragDropContext>
            </div>

            <div className='dlhp-settings'>
                <h3>{__( 'Settings', 'document-library-hub' )}</h3>

                {/* Include Categories */}
                <h4>{__( 'Include Categories', 'document-library-hub' )}</h4>
                <Select
                    isMulti
                    name="includeCategories"
                    options={categoryOptions}
                    value={categoryOptions.filter(option => librarySettingsData.includeCategories.includes(option.value))}
                    onChange={handleMultiSelectChange}
                    placeholder={ __( 'Select categories to include...', 'document-library-hub' ) }
                />

                {/* Folders Layout */}
                <h4>{__( 'Folders Layout', 'document-library-hub' )}</h4>
                <label>
                    <input
                        type="radio"
                        name="foldersLayout"
                        value="none"
                        checked={librarySettingsData.foldersLayout === "none"}
                        onChange={handleSettingsChange}
                    />
                    {__( 'None', 'document-library-hub' )}
                </label>
                <label>
                    <input
                        type="radio"
                        name="foldersLayout"
                        value="horizontal"
                        checked={librarySettingsData.foldersLayout === "horizontal"}
                        onChange={handleSettingsChange}
                    />
                    {__( 'Horizontal', 'document-library-hub' )}
                </label>
                <label>
                    <input
                        type="radio"
                        name="foldersLayout"
                        value="vertical"
                        checked={librarySettingsData.foldersLayout === "vertical"}
                        onChange={handleSettingsChange}
                    />
                    {__( 'Vertical', 'document-library-hub' )}
                </label>

                {/* Documents Layout */}
                <h4>{__( 'Documents Layout', 'document-library-hub' )}</h4>
                <label>
                    <input
                        type="radio"
                        name="documentsLayout"
                        value="grid"
                        checked={librarySettingsData.documentsLayout === "grid"}
                        onChange={handleSettingsChange}
                    />
                    {__( 'Grid', 'document-library-hub' )}
                </label>
                <label>
                    <input
                        type="radio"
                        name="documentsLayout"
                        value="table"
                        checked={librarySettingsData.documentsLayout === "table"}
                        onChange={handleSettingsChange}
                    />
                    {__( 'Table', 'document-library-hub' )}
                </label>
                
                {librarySettingsData.documentsLayout === "grid" ? (
                    <div>
                        {/* Grid Desktop Columns */}
                        <h4>{__('Grid Desktop Columns', 'document-library-hub')}</h4>
                        <input
                            type="number"
                            name="gridDesktopColumns"
                            value={librarySettingsData.gridDesktopColumns}
                            onChange={handleSettingsChange}
                            min="1"
                        />

                        {/* Grid Tablet Columns */}
                        <h4>{__('Grid Tablet Columns', 'document-library-hub')}</h4>
                        <input
                            type="number"
                            name="gridTabletColumns"
                            value={librarySettingsData.gridTabletColumns}
                            onChange={handleSettingsChange}
                            min="1"
                        />

                        {/* Grid Mobile Columns */}
                        <h4>{__('Grid Mobile Columns', 'document-library-hub')}</h4>
                        <input
                            type="number"
                            name="gridMobileColumns"
                            value={librarySettingsData.gridMobileColumns}
                            onChange={handleSettingsChange}
                            min="1"
                        />
                    </div>
                ) : null}

                {/* Grid Gap */}
                {librarySettingsData.documentsLayout === "grid" ? (
                    <div>
                        <h4>{__( 'Grid Gap', 'document-library-hub' )}</h4>
                        <input
                            type="number"
                            name="gridGap"
                            value={librarySettingsData.gridGap}
                            onChange={handleSettingsChange}
                            min="1"
                        />
                    </div>
                ) : null}

                {/* Center Content */}
                {librarySettingsData.documentsLayout === "grid" ? (
                    <div>
                        <h4></h4>
                        <label>
                            <input
                                type="checkbox"
                                name="centerContent"
                                checked={librarySettingsData.centerContent}
                                onChange={(e) => handleSettingsChange({ target: { name: 'centerContent', value: e.target.checked }})}
                            />
                            {__( 'Center Content?', 'document-library-hub' )}
                        </label>
                    </div>
                ) : null}

                {/* Remove Border */}
                {librarySettingsData.documentsLayout === "grid" ? (
                    <div>
                        <h4></h4>
                        <label>
                            <input
                                type="checkbox"
                                name="removeBorder"
                                checked={librarySettingsData.removeBorder}
                                onChange={(e) => handleSettingsChange({
                                    target: { name: 'removeBorder', value: e.target.checked }
                                })}
                            />
                            {__( 'Remove Border?', 'document-library-hub' )}
                        </label>
                    </div>
                ) : null}

                {/* Background Color */}
                {librarySettingsData.documentsLayout === "grid" ? (
                    <div>
                        <h4>{__( 'Background Color', 'document-library-hub' )}</h4>
                        <input
                            type="color"
                            name="backgroundColor"
                            value={librarySettingsData.backgroundColor}
                            onChange={handleSettingsChange}
                        />
                    </div>
                ) : null}

                {/* Title Size */}
                {librarySettingsData.documentsLayout === "grid" ? (
                    <div>
                        <h4>{__( 'Title Size', 'document-library-hub' )}</h4>
                        <input
                            type="number"
                            name="titleSize"
                            value={librarySettingsData.titleSize}
                            onChange={handleSettingsChange}
                            min="1"
                        />
                    </div>
                ) : null}

                {/* Sort */}
                <h4>{__( 'Sort By', 'document-library-hub' )}</h4>
                <select name="sort" value={librarySettingsData.sort} onChange={handleSettingsChange}>
                    <option value="date">{__( 'Date', 'document-library-hub' )}</option>
                    <option value="title">{__( 'Title', 'document-library-hub' )}</option>
                    <option value="menu_order">{__( 'Menu Order', 'document-library-hub' )}</option>
                    <option value="modified">{__( 'Last Modified', 'document-library-hub' )}</option>
                    <option value="comment_count">{__( 'Popularity', 'document-library-hub' )}</option>
                    <option value="rand">{__( 'Random', 'document-library-hub' )}</option>
                </select>

                {/* Order */}
                <h4>{__( 'Order', 'document-library-hub' )}</h4>
                <select name="order" value={librarySettingsData.order} onChange={handleSettingsChange}>
                    <option value="asc">{__( 'Ascending', 'document-library-hub' )}</option>
                    <option value="desc">{__( 'Descending', 'document-library-hub' )}</option>
                </select>

                {/* Per Page */}
                <h4>{__( 'Documents Per Page', 'document-library-hub' )}</h4>
                <input
                    type="number"
                    name="perPage"
                    value={librarySettingsData.perPage}
                    onChange={handleSettingsChange}
                    min="1"
                />

                {/* Table Display Limit */}
                {librarySettingsData.documentsLayout === "table" ? (
                    <div>
                        <h4>{__( 'Table Display Limit', 'document-library-hub' )}</h4>
                        <input
                            type="number"
                            name="tableDisplayLimit"
                            value={librarySettingsData.tableDisplayLimit}
                            onChange={handleSettingsChange}
                            min="1"
                        />
                    </div>
                ) : null}

                {/* Pagination */}
                {librarySettingsData.documentsLayout === "grid" ? (
                    <div>
                        <h4></h4>
                        <label>
                            <input
                                type="checkbox"
                                name="pagination"
                                checked={librarySettingsData.pagination}
                                onChange={(e) => handleSettingsChange({ target: { name: 'pagination', value: e.target.checked }})}
                            />
                            {__( 'Show Pagination?', 'document-library-hub' )}
                        </label>
                        </div>
                ) : null}

                {/* Search */}
                <h4></h4>
                <label>
                    <input
                        type="checkbox"
                        name="enableSearch"
                        checked={librarySettingsData.enableSearch}
                        onChange={(e) => handleSettingsChange({ target: { name: 'enableSearch', value: e.target.checked }})}
                    />
                    {__( 'Show Search Field?', 'document-library-hub' )}
                </label>
            </div>

            <input type="hidden" id="dlhp-library-data" name="dlhp_library_data" />
        </div>
    );
};

const container = document.getElementById('dlhp-library-builder-app');
const root = createRoot(container); 
root.render(<LibraryBuilder />);
