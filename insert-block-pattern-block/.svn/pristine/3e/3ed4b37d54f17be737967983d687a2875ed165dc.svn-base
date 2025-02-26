/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { useState, useEffect } = wp.element;
const { useSelect } = wp.data;
const { useBlockProps } = wp.blockEditor;
const { Placeholder, SelectControl } = wp.components;
const { parse, createBlock } = wp.blocks;

/**
 * InsertBlockPatternBlockEdit
 *
 * @param {*} props
 */
export const InsertBlockPatternBlockEdit = (props) => {
	const [selectedCategoryName, setSelectedCategoryName] = useState("default");
	const [selectCategoryOptions, setSelectCategoryOptions] = useState(false);

	const [showSelectPatterns, setShowSelectPatterns] = useState(false);
	const [selectedPatternName, setSelectedPatternName] = useState("default");
	const [selectPatternOptions, setSelectPatternOptions] = useState(false);

	const blockProps = useBlockProps();

	const blocks = useSelect((select) => {
		return select("core/block-editor").getBlocks();
	}, []);

	const blockHierarchyRootClientId = useSelect((select) => {
		return select("core/block-editor").getBlockHierarchyRootClientId(
			props.clientId
		);
	}, []);

	const { patternCategories, patterns } = useSelect((select) => {
		const {
			__experimentalBlockPatterns,
			__experimentalBlockPatternCategories
		} = select("core/block-editor").getSettings();
		return {
			patterns: __experimentalBlockPatterns,
			patternCategories: __experimentalBlockPatternCategories
		};
	}, []);

	useEffect(() => {
		// SELECT OPTIONS - FROM BLOCK PATTERNS
		const _selectCategoryOptions = lodash.map(
			patternCategories,
			(category) => {
				return {
					value: category.name,
					label: category.label
				};
			}
		);

		_selectCategoryOptions.unshift({
			value: "default",
			label: __("Select a Block Pattern Category", "ibpb"),
			disabled: true
		});
		_selectCategoryOptions.push({
			value: "uncategorized",
			label: __("Uncategorized", "ibpb")
		});
		setSelectCategoryOptions(_selectCategoryOptions);
	}, []);

	useEffect(() => {
		// ON SELECT OF PATTERN CATEGORY - CREATE CORESPONDING PATTERNS SELECT OPTION
		if (patterns.length > 0) {
			if (selectedCategoryName !== "default") {
				let _selectPatternOptions = [];

				if (selectedCategoryName !== "uncategorized") {
					lodash.map(patterns, (pattern) => {
						if (pattern.categories !== undefined) {
							if (
								pattern.categories.includes(
									selectedCategoryName
								)
							) {
								_selectPatternOptions.push({
									value: pattern.name,
									label: pattern.title
								});
							}
						}
					});
				} else {
					// PATTERNS CAN HAVE UNDEFINED PATTERN_CATEGORY
					lodash.map(patterns, (pattern) => {
						if (pattern.categories === undefined) {
							_selectPatternOptions.push({
								value: pattern.name,
								label: pattern.title
							});
						}
					});
				}

				_selectPatternOptions.unshift({
					value: "default",
					label: __("Select a Block Pattern", "ibpb"),
					disabled: true
				});

				setSelectPatternOptions(_selectPatternOptions);
				setShowSelectPatterns(true);
			}
		}
	}, [selectedCategoryName]);

	useEffect(() => {
		if (showSelectPatterns !== false && selectedPatternName !== "default") {
			// BLOCK INDEX - THIS BLOCK
			let blockIndex = 0;
			lodash.map(blocks, (block, index) => {
				if (block.clientId === props.clientId) {
					blockIndex = index;
				}
			});

			// FIND PATTERN
			const foundPattern = lodash.find(patterns, (pattern) => {
				return selectedPatternName === pattern.name;
			});

			// PARSE PATTERN
			const patternParse = parse(foundPattern.content);

			// CREATE BLOCK
			const created = createBlock(
				patternParse[0].name,
				patternParse[0].attributes,
				patternParse[0].innerBlocks
			);

			if (blockHierarchyRootClientId === props.clientId) {
				// INSERT NEW BLOCK PREPEND CURRENT INDEX
				dispatch("core/block-editor").insertBlocks(created, blockIndex);
			} else {
				//INSERT INTO NESTED BLOCK - INTO LAST ELEMENT IN PARENTBLOCKS
				const parentBlocks = wp.data
					.select("core/block-editor")
					.getBlockParents(props.clientId);

				dispatch("core/block-editor").insertBlocks(
					created,
					0,
					parentBlocks[parentBlocks.length - 1]
				);
			}

			// REMOVE INSERT BLOCK PATTERN BLOCK - AKA THIS BLOCK
			setTimeout(() => {
				dispatch("core/block-editor").removeBlock(props.clientId);
			}, 200);
		}
	}, [selectedPatternName]);

	// RETURN ONLY PLACEHOLDER - AS THIS BLOCK WILL BE REMOVED
	return (
		<div {...blockProps}>
			<Placeholder
				icon="table-row-before"
				label={__("Insert Block Pattern", "ibpb")}
			>
				<SelectControl
					value={selectedCategoryName}
					options={selectCategoryOptions}
					onChange={(value) => {
						setSelectedCategoryName(value);
					}}
				/>
				{showSelectPatterns !== false && (
					<div style={{ marginLeft: 20 }}>
						<SelectControl
							value={selectedPatternName}
							options={selectPatternOptions}
							onChange={(value) => {
								setSelectedPatternName(value);
							}}
						/>
					</div>
				)}
			</Placeholder>
		</div>
	);
};
