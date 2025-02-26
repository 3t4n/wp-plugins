
import React, { useState, useEffect, useRef } from 'react';
import { InspectorControls, useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { PanelBody, RangeControl, Button, ToggleControl, Notice, Dashicon, TextControl } from '@wordpress/components';
import { Grid } from 'gridjs';
import { __ } from '@wordpress/i18n';
import { __experimentalNumberControl as NumberControl } from '@wordpress/components'
import * as d3 from 'd3';
import { TabPanel, ColorPalette, SelectControl } from '@wordpress/components';

import {
    __experimentalToggleGroupControl as ToggleGroupControl,
    __experimentalToggleGroupControlOption as ToggleGroupControlOption,
} from "@wordpress/components";

export default function Edit({ attributes, setAttributes }) {
    
    const { DataSearch, fileUrl, attachmentId, TablePagination,
        FixedHeader, tableHeight, DataSorting, TableResizableColomns, TableWidth
        , headerTextAlign, headerTextColor, headerBgColor, headerPadding, borderWidth, borderColor, borderStyle
        , rowTextAlign, rowTextColor, rowBgColor, rowPadding, AlternateColorToggler, rowOddColor,hoverColor, rowEvenColor
        ,TexthoverColor} = attributes;

    const [tableData, setTableData] = useState([]);
    const gridRef = useRef(null);
    const [localHeight, setLocalHeight] = useState('');
    const [filePathUrl, setFilePathUrl] = useState('')
    const [csvValidate, setCsvValidate] = useState('')
    const [activeTab, setActiveTab] = useState('tab1');

    // Handle tab change
    const handleTabChange = (newTab) => {
        setActiveTab(newTab);
    };

    // General Handler function
    const handleAttributeChange = (attribute, value) => {
        setAttributes({ ...attributes, [attribute]: value });
    };
  
    // Usage examples
    const handleHeaderTextAlign = (value) => handleAttributeChange('headerTextAlign', value);
    const handleHeaderTextColorChange = (color) => handleAttributeChange('headerTextColor', color);
    const handleHeaderBgColor = (color) => handleAttributeChange('headerBgColor', color);

    const handleRowTextAlign = (value) => handleAttributeChange('rowTextAlign', value);
    const handleRowTextColorChange = (color) => handleAttributeChange('rowTextColor', color);
    const handleRowBgColor = (color) => handleAttributeChange('rowBgColor', color);

    const handleOddRowBgColor = (color) => handleAttributeChange('rowOddColor', color);
    const handleEvenRowColorChange = (color) => handleAttributeChange('rowEvenColor', color);
    const handleHoverColorChange = (color) => handleAttributeChange('hoverColor', color);
    const handleTextHoverColorChange = (color) => handleAttributeChange('TexthoverColor', color);

    const handleBorderStyle = (value) => handleAttributeChange('borderStyle', value);
    const handleBorderColor = (value) => handleAttributeChange('borderColor', value);
    
    useEffect(() => {

        if (fileUrl) {
            setFilePathUrl(fileUrl)
        }
    }, [fileUrl])

    useEffect(() => {

        if (tableHeight) {
            const height = tableHeight.replace('px', '');
            setLocalHeight(height);
        }
    }, [tableHeight]);

    useEffect(() => {

        const fetchData = async () => {
            if (fileUrl) {
                try {
                    const rows = await d3.csv(fileUrl);
                    const parsedData = convertTo2DArray(rows);
                    setTableData(parsedData);
                } catch (error) {
                    console.error("Error re-fetching CSV data with D3:", error);
                }
            }
        };
        fetchData();
    }, [fileUrl, attachmentId]);

    useEffect(() => {

        // Check if tableData is empty or gridRef.current is null
        if (tableData.length === 0 || !gridRef.current) {
            return;
        }
        const gridContainer = gridRef.current;
        gridContainer.style.setProperty('--hover-color', hoverColor);
        gridContainer.style.setProperty('--hover-text-color', TexthoverColor);
        if (AlternateColorToggler === true && gridContainer) {
            // Set CSS variables dynamically
            gridContainer.style.setProperty('--even-row-color', rowEvenColor);
            gridContainer.style.setProperty('--odd-row-color', rowOddColor);
            
        } else {
            gridContainer.style.setProperty('--even-row-color', rowBgColor);
            gridContainer.style.setProperty('--odd-row-color', rowBgColor);
        }

        const grid = new Grid({

            columns: tableData[0],
            pagination: { limit: TablePagination },
            search: DataSearch,

            data: () => {
                return new Promise(resolve => {
                    const dataWithoutHeader = tableData.slice(1);
                    setTimeout(() =>
                        resolve(dataWithoutHeader), 1000);
                });
            },

            style: {
                table: {
                    'border': `${borderWidth} ${borderStyle} ${borderColor}`,
                },
                th: {
                    'background-color': headerBgColor,
                    'color': headerTextColor,
                    'text-align': headerTextAlign,
                    'padding': headerPadding, // Optional for better spacing
                },
                td: {
                    'color': rowTextColor,
                    'text-align': rowTextAlign,
                    'padding': rowPadding, // Optional for better spacing
                    
                },
            },

            sort: DataSorting,
            resizable: TableResizableColomns,
            width: TableWidth,
            fixedHeader: FixedHeader,
            height: tableHeight,
        }).render(gridRef.current);

        // Ensure to destroy the old instance when the component unmounts
        return () => {
            grid.destroy();
        };

    }, [tableData, DataSearch, TablePagination, tableHeight, FixedHeader, DataSorting, TableResizableColomns,
        headerTextColor, TableWidth, headerTextAlign, headerBgColor, headerPadding, borderWidth, borderColor, borderStyle
        , rowTextAlign, rowTextColor, rowBgColor, rowPadding, AlternateColorToggler, rowOddColor, rowEvenColor, hoverColor ,TexthoverColor]);

    const handleFileChange = async (media) => {

        // Check if the uploaded file is a CSV
        if (media.subtype !== 'csv') {
            // Display a notice for invalid file type
            setCsvValidate(__('Only CSV files are allowed', 'advanced-datatable')),
            setTableData([]);
            setAttributes({ ...attributes, attachmentId: '', fileUrl: '' });
            return;
        }

        // Clear the validation notice if the file is valid
        setCsvValidate('');

        const fileUrl = media.url;
        try {
            const rows = await d3.csv(fileUrl);
            const parsedData = convertTo2DArray(rows);
            setAttributes({ ...attributes, attachmentId: media.id, fileUrl });
            setTableData(parsedData);
        } catch (error) {
            console.error("Error processing CSV file with D3:", error);
        }
    };
    
    const convertTo2DArray = (data) => {
        if (data.length === 0) return [];
        const headers = Object.keys(data[0]);
        const rows = data.map(row => headers.map(header => row[header]));
        return [headers, ...rows];
    };

    const TablePaginationLimit = (value) => {
        setAttributes({ ...attributes, TablePagination: value })
    }

    const TableColomsResize = (newWidth) => {
        setAttributes({ ...attributes, TableWidth: (`${newWidth}px`) });
    }

    useEffect(() => {
        if (FixedHeader && !tableHeight) {
            setAttributes({
                ...attributes,
                tableHeight: '200px',
            });
            setLocalHeight('200');
        } else if (FixedHeader === false && !tableHeight) {
            setAttributes({
                ...attributes,
                tableHeight: '',
            });
            setLocalHeight('');
        }
    }, [FixedHeader]);


    const HandleTableHeight = (newHeight) => {

        setLocalHeight(newHeight);


        if (!isNaN(newHeight) && newHeight.trim() !== '') {

            setAttributes({
                ...attributes,
                tableHeight: `${parseFloat(newHeight)}px`,
            });
        } else if (newHeight.trim() === '') {
            setAttributes({
                ...attributes,
                tableHeight: '',
                FixedHeader: false,
            });
        }
    };



    const handleFixedHeaderToggler = () => {

        const newFixedHeaderState = !FixedHeader;

        setAttributes({
            ...attributes,
            FixedHeader: newFixedHeaderState,
        });
    };

    return (
        <div {...useBlockProps()}>

            <InspectorControls>
                <TabPanel
                    className="my-tab-panel"
                    tabs={[
                        {
                            name: 'Data-Source',
                            title: __('Data Source', 'advanced-datatable'),
                            className: 'tab-two',
                        },
                        {
                            name: 'styling-Ui',
                            title: __('Styling UI', 'advanced-datatable'),
                            className: 'tab-one',
                        },



                    ]}
                    activeTab={activeTab}
                    onSelect={handleTabChange}
                >
                    {(tab) => (
                        <div>

                        </div>
                    )}
                </TabPanel>
            </InspectorControls>
            {csvValidate.length !== 0 ? (
                <Notice status="error" isDismissible={false}>
                    {csvValidate}
                </Notice>
            ) : (
                tableData.length === 0 ? (
                    <Notice isDismissible={false}>{__('Please upload a CSV file from the block settings.', 'advanced-datatable')}</Notice>
                ) : (
                    <div ref={gridRef}></div>
                )
            )}
            {activeTab === "Data-Source" && <InspectorControls>
                <PanelBody title={__('Data Source', 'advanced-datatable')}>
                    <MediaUploadCheck>
                        <MediaUpload
                            allowedTypes={['text/csv']}
                            onSelect={handleFileChange}
                            render={({ open }) => (
                                <Button onClick={open} isSecondary>
                                    <Dashicon icon="upload" />
                                    {__('Upload CSV', 'advanced-datatable')}
                                </Button>
                            )}
                        />
                    </MediaUploadCheck>
                    {fileUrl && <div style={{ marginTop: "20px" }}>
                        <div style={{ fontSize: "14px", marginBottom: "5px" }}>
                            {__('Uploaded File:', 'advanced-datatable')}
                        </div>
                        <div style={{
                            backgroundColor: "#f8f8f8",
                            border: "1px solid #ddd",
                            padding: "10px",
                            borderRadius: "4px",
                            fontSize: "13px",
                            color: "#333",
                            wordWrap: "break-word"
                        }}>
                            {filePathUrl}
                        </div>
                    </div>}
                </PanelBody>
            </InspectorControls>}

            {activeTab === "Data-Source" && tableData.length !== 0 && <InspectorControls>
                <PanelBody title={__("Datatable Settings", 'advanced-datatable')}>

                    <ToggleControl
                        checked={!!DataSorting}
                        label={__('Enable Column Sorting', 'advanced-datatable')}
                        onChange={() =>
                            setAttributes({
                                DataSorting: !DataSorting,

                            })
                        }
                    />
                    <ToggleControl
                        checked={!!DataSearch}
                        label={__('Enable Search Bar', 'advanced-datatable')}
                        onChange={() =>
                            setAttributes({
                                DataSearch: !DataSearch,

                            })
                        }
                    />
                    <RangeControl
                        help={__("Enter number of rows to display per page. Minimum is 10 and maximum is 100", 'advanced-datatable')}
                        value={TablePagination}
                        label={__("Rows per Page", 'advanced-datatable')}
                        max={100}
                        min={1}
                        onChange={TablePaginationLimit}
                    />

                    <NumberControl
                        label={__("Table Width", 'advanced-datatable')}
                        help={__("If kept blank, table will take full width and will be responsive. Its recommended. If you want fix width table, enter numeric value in pixels.", 'advanced-datatable')}
                        onChange={TableColomsResize}
                        value={parseInt(TableWidth)}
                        min={200}
                    />
                    {

                        <TextControl
                            label={__("Table Height", 'advanced-datatable')}
                            help={__("If kept blank, table will automatically take height according to the number of records displayed. Its recommended. If you want fix height of table, enter numeric values in pixels.", 'advanced-datatable')}
                            onChange={HandleTableHeight}
                            value={localHeight}
                            min={200}
                            type='number'
                        />

                    }
                    <ToggleControl
                        checked={!!FixedHeader}
                        label={__('Sticky Table Header', 'advanced-datatable')}
                        onChange={handleFixedHeaderToggler}
                        help={__("Enable this to always display the table headers. This setting will only work when you provide a numeric height to the table.", "advanced-datatable")}
                    />
                </PanelBody>

            </InspectorControls>}


            {activeTab === "styling-Ui" && <InspectorControls>
                <PanelBody title={__('Header Styling', 'advanced-datatable')}>
                    <div style={{ display: "flex", alignItems: "center" }}>
                        <div>
                            <ToggleGroupControl
                                label="Text Alignment"
                                value={headerTextAlign}
                                style={{ width: "230px" }}
                                onChange={handleHeaderTextAlign}
                                help="Select alignment for pagination controls."
                            >
                                <ToggleGroupControlOption value="left" label="Left" />
                                <ToggleGroupControlOption value="center" label="Center" />
                                <ToggleGroupControlOption value="right" label="Right" />

                            </ToggleGroupControl>
                        </div>
                    </div>
                    <RangeControl
                        help={__("Apply Header Padding", 'advanced-datatable')}
                        value={parseInt(headerPadding)}
                        label={__("Header Padding", 'advanced-datatable')}
                        max={100}
                        min={1}
                        onChange={(value) => {
                            const updatedheaderPadding = `${value}px`;
                            setAttributes({ headerPadding: updatedheaderPadding });
                        }}
                    />
                     <div>
                        <label className="label " htmlFor="color-palette">{__("Select Header Text Color", 'advanced-datatable')} </label>
                        <ColorPalette
                            id="color-palette"
                            value={headerTextColor}
                            onChange={(color) => handleHeaderTextColorChange(color)}
                        />
                    </div>
                   
                   
                    <div>
                        <label className="label " htmlFor="color-palette">{__("Select Header Background Color", 'advanced-datatable')} </label>
                        <ColorPalette
                            id="color-palette"
                            value={headerBgColor}
                            onChange={(color) => handleHeaderBgColor(color)}
                        />
                    </div>
                   
                  

                </PanelBody>

            </InspectorControls>}
            {activeTab === "styling-Ui" &&


                <InspectorControls>
                    <PanelBody title={__("Rows Styling ", "advanced-datatable")}>
                        <div style={{ display: "flex", alignItems: "center" }}>
                            <div>
                                <ToggleGroupControl
                                    label="Text Alignment"
                                    value={rowTextAlign}
                                    style={{ width: "230px" }}
                                    onChange={handleRowTextAlign}
                                    help={__("Select the alignment for pagination controls.")}
                                >
                                    <ToggleGroupControlOption value="left" label="Left" />
                                    <ToggleGroupControlOption value="center" label="Center" />
                                    <ToggleGroupControlOption value="right" label="Right" />

                                </ToggleGroupControl>
                            </div>
                        </div>
                    
                        <RangeControl
                            value={parseInt(rowPadding)}
                            label={__("Apply Row Padding", 'advanced-datatable')}
                            help={__("Apply padding to table rows. Set it equal to header padding is recommended.", 'advanced-datatable')}
                            max={100}
                            min={1}
                            onChange={(value) => {
                                const updatedRowPadding = `${value}px`;
                                setAttributes({ rowPadding: updatedRowPadding });
                            }}
                        />
                        <div>
                            <label className="label " htmlFor="color-palette">{__("Row Text color", 'advanced-datatable')}</label>
                            <ColorPalette
                                id="color-palette"
                                value={rowTextColor}
                                onChange={(color) => handleRowTextColorChange(color)}
                            />
                        </div>
                        <ToggleControl
                            checked={AlternateColorToggler}
                            label={AlternateColorToggler
                                ? __("Set Alternate Row Colors", "advanced-datatable")
                                : __("Set Single Row Color", "advanced-datatable")}
                            onChange={() =>
                                setAttributes({
                                    AlternateColorToggler: !AlternateColorToggler,
                                })
                            }
                        />

                        {AlternateColorToggler && (
                            <div>

                                <div>
                                    <label className="label" htmlFor="color-palette">
                                    {__('Row Even color', 'advanced-datatable')}
                                    </label>
                                    <ColorPalette
                                        id="color-palette"
                                        value={rowEvenColor}
                                        onChange={(color) => handleEvenRowColorChange(color)}
                                    />
                                </div>
                            
                                <div>
                                    <label className="label" htmlFor="color-palette">
                                    {__('Row Odd color', 'advanced-datatable')}
                                    </label>
                                    <ColorPalette
                                        id="color-palette"
                                        value={rowOddColor}
                                        onChange={(color) => handleOddRowBgColor(color)}
                                    />
                                </div>


                              


                             
                            </div>

                        )}
                        {AlternateColorToggler === false && (<div>
                            <label className="label " htmlFor="color-palette">{__('Row Background color', 'advanced-datatable')} </label>
                            <ColorPalette
                                id="color-palette"
                                value={rowBgColor}
                                onChange={(color) => handleRowBgColor(color)}
                            />
                        </div>)}
                        <div>
                        <label className="label " htmlFor="color-palette">{__("Select Hover Text color", 'advanced-datatable')} </label>
                        <ColorPalette
                            id="color-palette"
                            value={TexthoverColor}
                            onChange={(color) => handleTextHoverColorChange(color)}
                        />
                    </div>
                        <div>
                        <label className="label " htmlFor="color-palette">{__("Select Hover Background Color", 'advanced-datatable')} </label>
                        <ColorPalette
                            id="color-palette"
                            value={hoverColor}
                            onChange={(color) => handleHoverColorChange(color)}
                        />
                    </div>
                  
                       
                       
                    </PanelBody>
                </InspectorControls>

            }
            {activeTab === "styling-Ui" && <InspectorControls>
                <PanelBody title={__('Border Styling', 'advanced-datatable')}>
                    <div>
                        
                        <SelectControl
                            label="Table Border"
                            options={[
                                { label: "None", value: "none" },
                                { label: "Solid", value: "solid" },
                                { label: "Dotted", value: "dotted" },
                                { label: "Dashed", value: "dashed" },
                                { label: "Double", value: "double" },
                                { label: "Groove", value: "groove" },
                                { label: "Ridge", value: "ridge" },
                                { label: "Inset", value: "inset" },
                                { label: "Outset", value: "outset" },
                                { label: "Hidden", value: "hidden" },
                            ]}
                              value={borderStyle}
                            onChange={handleBorderStyle}
                        />
                    </div>
                 
                    <div>
                        <label
                            className="label "
                            htmlFor="color-palette"

                        >
                        {__('Select Border Color', 'advanced-datatable')}
                            
                        </label>
                        <ColorPalette
                            id="color-palette"
                            value={borderColor}
                            onChange={(color) => handleBorderColor(color)}
                        />
                    </div>
                
                    <div>
                        <RangeControl
                            help={__("Enter px value to apply border to table.", 'advanced-datatable')}
                            value={parseInt(borderWidth)}
                            label={__("Border Weight", 'advanced-datatable')}
                            max={100}
                            min={1}
                            onChange={(value) => {
                                const updatedBorderWidth = `${value}px`;
                                setAttributes({ borderWidth: updatedBorderWidth });
                            }}
                        />
                    </div>
                </PanelBody>

            </InspectorControls>}

        </div>
    );
}
