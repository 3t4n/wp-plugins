;(() => {
	class EhTricksCodeEditor {
		constructor() {
			this.app = window.parent.document.querySelector('#app')

			if (!this.app) return

			this.bdClasses = {
				dialog: 'v-dialog--active',
				dialogContent: 'v-dialog__content',
				dialogHeader: 'code-input-dialog-header',
				codeInputDialog: 'code-input-dialog',
				codeInputHeader: 'code-input-dialog-header',
				codeInputCloseButton: 'code-input-dialog-close',
				overlay: 'v-overlay',
				overlayScrim: 'v-overlay__scrim',
				codeMirror: 'CodeMirror',
				codeMirrorGutters: 'CodeMirror-gutters',
			}

			this.ehClasses = {
				actionsBar: 'eh-actions-bar',
				actionsBarButtonWrapper: 'eh-actions-bar__btn-wrapper',
				actionBarButton: 'eh-action-bar__btn',
				popover: 'eh-popover',
				popoverWrapper: 'eh-popover__wrapper',
				popoverContainer: 'eh-popover__container',
				popoverButton: 'eh-popover__btn',
				dockingPopoverToggle: 'eh-docking-popover-toggle',
				dockingPopover: 'eh-docking-popover',
				dockingPopoverWrapper: 'eh-docking-popover__wrapper',
				dockTopLeftButton: 'eh-dock-top-left',
				dockTopRightButton: 'eh-dock-top-right',
				dockBottomLeftButton: 'eh-dock-bottom-left',
				dockBottomRightButton: 'eh-dock-bottom-right',
				colorsPopoverToggle: 'eh-colors-popover-toggle',
				colorsPopover: 'eh-colors-popover',
				colorsPopoverWrapper: 'eh-colors-popover__wrapper',
				colorsPopoverButton: 'eh-colors-popover__btn',
			}

			this.ehIcons = {
				colors: `
					<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.5 6C12.7761 6 13 5.77614 13 5.5C13 5.22386 12.7761 5 12.5 5C12.2239 5 12 5.22386 12 5.5C12 5.77614 12.2239 6 12.5 6Z" fill="currentColor"/>
						<path d="M16.5 10C16.7761 10 17 9.77614 17 9.5C17 9.22386 16.7761 9 16.5 9C16.2239 9 16 9.22386 16 9.5C16 9.77614 16.2239 10 16.5 10Z" fill="currentColor"/>
						<path d="M7.5 7C7.77614 7 8 6.77614 8 6.5C8 6.22386 7.77614 6 7.5 6C7.22386 6 7 6.22386 7 6.5C7 6.77614 7.22386 7 7.5 7Z" fill="currentColor"/>
						<path d="M5.5 12C5.77614 12 6 11.7761 6 11.5C6 11.2239 5.77614 11 5.5 11C5.22386 11 5 11.2239 5 11.5C5 11.7761 5.22386 12 5.5 12Z" fill="currentColor"/>
						<path d="M12.5 6C12.7761 6 13 5.77614 13 5.5C13 5.22386 12.7761 5 12.5 5C12.2239 5 12 5.22386 12 5.5C12 5.77614 12.2239 6 12.5 6Z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M16.5 10C16.7761 10 17 9.77614 17 9.5C17 9.22386 16.7761 9 16.5 9C16.2239 9 16 9.22386 16 9.5C16 9.77614 16.2239 10 16.5 10Z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M7.5 7C7.77614 7 8 6.77614 8 6.5C8 6.22386 7.77614 6 7.5 6C7.22386 6 7 6.22386 7 6.5C7 6.77614 7.22386 7 7.5 7Z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M5.5 12C5.77614 12 6 11.7761 6 11.5C6 11.2239 5.77614 11 5.5 11C5.22386 11 5 11.2239 5 11.5C5 11.7761 5.22386 12 5.5 12Z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M11 1C5.5 1 1 5.5 1 11C1 16.5 5.5 21 11 21C11.926 21 12.648 20.254 12.648 19.312C12.648 18.875 12.468 18.477 12.211 18.187C11.921 17.898 11.773 17.535 11.773 17.062C11.7692 16.8419 11.8098 16.6233 11.8922 16.4192C11.9747 16.2151 12.0975 16.0298 12.2531 15.8741C12.4088 15.7185 12.5941 15.5957 12.7982 15.5132C13.0023 15.4308 13.2209 15.3902 13.441 15.394H15.437C18.488 15.394 20.992 12.891 20.992 9.84C20.965 5.012 16.461 1 11 1Z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				`,
				docking: `
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 86 76">
						<path fill="none" stroke="currentColor" stroke-width="5" d="M38 3H7.917a5 5 0 0 0-4.999 4.917L2.5 33M38 3v25a5 5 0 0 1-5 5H2.5M38 3h10M2.5 33v10M37 73H7.5a5 5 0 0 1-5-5V43M37 73V48a5 5 0 0 0-5-5H2.5M37 73h12M48 3h30a5 5 0 0 1 5 5v25M48 3v25a5 5 0 0 0 5 5h30m0 0v10M49 73h29a5 5 0 0 0 5-5V43M49 73V48a5 5 0 0 1 5-5h29"/>
					</svg>
				`,
				dockBottomLeft: `
					<svg width="86" height="76" viewBox="0 0 86 76" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill="none" stroke="currentColor" stroke-width="5" d="M37 73H7.5C4.73858 73 2.5 70.7614 2.5 68V43M37 73V48C37 45.2386 34.7614 43 32 43H19.75H2.5M37 73H49H78C80.7614 73 83 70.7614 83 68V43V33V8C83 5.23858 80.7614 3 78 3H48H38H7.91736C5.18842 3 2.96353 5.18812 2.91806 7.91668L2.5 33V43"/>
					</svg>
				`,
				dockTopLeft: `
					<svg width="86" height="76" viewBox="0 0 86 76" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill="none" stroke="currentColor" stroke-width="5" d="M38 3H7.91736C5.18842 3 2.96353 5.18812 2.91806 7.91668L2.5 33M38 3V28C38 30.7614 35.7614 33 33 33H2.5M38 3H48H78C80.7614 3 83 5.23858 83 8V33V43V68C83 70.7614 80.7614 73 78 73H49H37H7.5C4.73858 73 2.5 70.7614 2.5 68V43V33"  />
					</svg>
				`,
				dockBottomRight: `
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 86 76">
						<path fill="none" stroke="currentColor" stroke-width="5" d="M49 73h29a5 5 0 0 0 5-5V43M49 73H7.5a5 5 0 0 1-5-5V33l.418-25.083a5 5 0 0 1 5-4.917H78a5 5 0 0 1 5 5v35M49 73V48a5 5 0 0 1 5-5h29"/>
					</svg>
				`,
				dockTopRight: `
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 86 76">
						<path fill="none" stroke="currentColor" stroke-width="5" d="M48 3H7.917a5 5 0 0 0-4.999 4.917L2.5 33v35a5 5 0 0 0 5 5H78a5 5 0 0 0 5-5V33M48 3h30a5 5 0 0 1 5 5v25M48 3v25a5 5 0 0 0 5 5h30"/>
					</svg>
				`,
			}

			this.position = {
				x: 0,
				y: 0,
			}

			this.canBeDragged = true
			this.dragRafID = null
			this.dragRafHandler = this.dragRaf.bind(this)

			this.onDragHandler = this.onDrag.bind(this)

			this.init()
		}

		init() {
			this.initMutationObserver(this.app, this.onAppMutationObserved.bind(this))
			this.injectCSS()
		}

		initTricks() {
			this.initDraggable()
			this.initResizeObservable()
			this.insertHeaderActionsDom()
			this.initOverlaySetup()
			this.initLineNumbers()

			if (this.currentDialogObserver) return

			this.currentDialogObserver = this.initMutationObserver(
				this.currentDialog,
				this.onDialogMutationObserved.bind(this)
			)

			this.initEvents()
		}

		onAppMutationObserved(mutationList) {
			this.isDialogPresent = false
			for (const mutation of mutationList) {
				for (const node of mutation.addedNodes) {
					if (!node.classList.contains(this.bdClasses.dialogContent)) continue

					this.isDialogPresent = true

					this.currentDialog = node.querySelector(`.${this.bdClasses.dialog}`)
					if (this.currentDialogObserver) {
						this.currentDialogObserver.disconnect()
						this.currentDialogObserver = null
					}

					this.initTricks()
				}
			}
		}

		onDialogMutationObserved(mutationList) {
			for (const mutation of mutationList) {
				for (const node of mutation.addedNodes) {
					if (!node.classList.contains(this.bdClasses.codeInputDialog)) continue
					this.initTricks()
				}
			}
		}

		initMutationObserver(target, handler) {
			const mutationConfig = {
				attributes: false,
				childList: true,
				subtree: false,
			}

			const observer = new MutationObserver(handler)

			observer.observe(target, mutationConfig)

			return observer
		}

		onDrag(e) {
			this.position.x = e.clientX - this.startX
			this.position.y = e.clientY - this.startY
			this.position.y = Math.max(-24, this.position.y - 53)
		}

		dragRaf() {
			if (!this.currentDialog || !this.isDragging) return
			this.currentDialog.style.top = `${this.position.y}px`
			this.currentDialog.style.left = `${this.position.x}px`
			this.dragRafID = requestAnimationFrame(this.dragRafHandler)
		}

		initDraggable() {
			if (!this.currentDialog) return

			const header = this.currentDialog.querySelector(`.${this.bdClasses.dialogHeader}`)
			if (!header) return

			header.addEventListener('mousedown', (e) => {
				if (this.isDragging || !this.canBeDragged) return

				this.startX = e.clientX - this.currentDialog.offsetLeft
				this.startY = e.clientY - this.currentDialog.offsetTop

				this.position = {
					x: this.currentDialog.offsetLeft - 24,
					y: this.currentDialog.offsetTop - 24,
				}

				this.isDragging = true

				window.parent.addEventListener('mousemove', this.onDragHandler)
				this.dragRafID = requestAnimationFrame(this.dragRaf.bind(this))
			})

			window.parent.addEventListener('mouseup', () => {
				this.isDragging = false
				window.parent.removeEventListener('mousemove', this.onDragHandler)
				cancelAnimationFrame(this.dragRafID)
			})
		}

		initResizeObservable() {
			if (!this.currentDialog) return

			const resizeObserver = new ResizeObserver((entries) => {
				entries.forEach((entry) => {
					const editor = this.currentDialog?.querySelector(`.${this.bdClasses.codeInputDialog}`)
					this.topMax = -1 * editor?.offsetTop
					this.currentDialog.querySelector('.CodeMirror')?.CodeMirror.refresh()
				})
			})

			resizeObserver.observe(this.currentDialog)
		}

		insertHeaderActionsDom() {
			if (!this.currentDialog) return

			const closeBtn = this.currentDialog.querySelector(
				`.${this.bdClasses.dialogHeader} .${this.bdClasses.codeInputCloseButton}`
			)

			if (!closeBtn) return

			this.actionsBar = document.createElement('div')
			this.actionsBar.classList.add(this.ehClasses.actionsBar)

			closeBtn.insertAdjacentElement('beforeBegin', this.actionsBar)

			const colorAction = this.generateColorAction()
			this.actionsBar.appendChild(colorAction)
			this.initColorsActionsEvents()

			const dockingAction = this.generateDockingAction()
			this.actionsBar.appendChild(dockingAction)

			this.initDockingActionsEvents()
		}

		generateDockingAction() {
			const dockingPopoverContent = []

			dockingPopoverContent.push(
				this.generateIconButton({
					iconSvg: this.ehIcons.dockTopLeft,
					classes: `${this.ehClasses.actionBarButton} ${this.ehClasses.popoverButton} ${this.ehClasses.dockTopLeftButton}`,
					attributes: [
						{
							name: 'eh-tooltip',
							value: 'Dock Top Left',
						},
					],
					size: 'small',
				})
			)
			dockingPopoverContent.push(
				this.generateIconButton({
					iconSvg: this.ehIcons.dockTopRight,
					classes: `${this.ehClasses.actionBarButton} ${this.ehClasses.popoverButton} ${this.ehClasses.dockTopRightButton}`,
					attributes: [
						{
							name: 'eh-tooltip',
							value: 'Dock Top Right',
						},
					],
					size: 'small',
				})
			)
			dockingPopoverContent.push(
				this.generateIconButton({
					iconSvg: this.ehIcons.dockBottomLeft,
					classes: `${this.ehClasses.actionBarButton} ${this.ehClasses.popoverButton} ${this.ehClasses.dockBottomLeftButton}`,
					attributes: [
						{
							name: 'eh-tooltip',
							value: 'Dock Bottom Left',
						},
					],
					size: 'small',
				})
			)
			dockingPopoverContent.push(
				this.generateIconButton({
					iconSvg: this.ehIcons.dockBottomRight,
					classes: `${this.ehClasses.actionBarButton} ${this.ehClasses.popoverButton} ${this.ehClasses.dockBottomRightButton}`,
					attributes: [
						{
							name: 'eh-tooltip',
							value: 'Dock Bottom Right',
						},
					],
					size: 'small',
				})
			)

			const dockingButton = this.generateActionButton({
				button: this.generateIconButton({
					iconSvg: this.ehIcons.docking,
					classes: `${this.ehClasses.actionBarButton} ${this.ehClasses.dockingPopoverToggle}`,
				}),
				popover: this.generatePopover({
					popoverClasses: this.ehClasses.dockingPopover,
					popoverWrapperClasses: this.ehClasses.dockingPopoverWrapper,
					content: dockingPopoverContent,
				}),
			})

			return dockingButton
		}

		generateColorAction() {
			const {
				background: backgroundColor,
				brand: brandColor,
				headings: headingsColor,
				links: linksColor,
				text: textColor,
				palette,
			} = window.parent.Breakdance.stores.globalStore.globalSettings.settings.colors

			let dialogStyle = ``

			const brandColors = [
				{
					cssVariableName: 'bde-brand-primary-color',
					label: 'Brand',
					value: brandColor,
				},
				{
					cssVariableName: 'bde-body-text-color',
					label: 'Text',
					value: textColor,
				},
				{
					cssVariableName: 'bde-headings-color',
					label: 'Headings',
					value: headingsColor,
				},
				{
					cssVariableName: 'bde-links-color',
					label: 'Links',
					value: linksColor,
				},
				{
					cssVariableName: 'bde-background-color',
					label: 'Background',
					value: backgroundColor,
				},
			]

			const colorActionPopoverContent = []

			if (palette) {
				if (palette.hasOwnProperty('gradients')) {
					if (palette.gradients.length > 0) {
						const gradientsContainer = document.createElement('div')
						gradientsContainer.classList.add(this.ehClasses.popoverContainer)

						palette.gradients.forEach((color) => {
							gradientsContainer.appendChild(this.generateColorButton(color))
							dialogStyle += `--${color.cssVariableName}: ${color.value.value};`
						})
						colorActionPopoverContent.push(gradientsContainer)
					}
				}

				if (palette.hasOwnProperty('colors')) {
					if (palette.colors.length > 0) {
						const colorsContainer = document.createElement('div')
						colorsContainer.classList.add(this.ehClasses.popoverContainer)

						palette.colors.forEach((color) => {
							colorsContainer.appendChild(this.generateColorButton(color))
							dialogStyle += `--${color.cssVariableName}: ${color.value};`
						})

						colorActionPopoverContent.push(colorsContainer)
					}
				}
			}

			const brandColorsContainer = document.createElement('div')
			brandColorsContainer.classList.add(this.ehClasses.popoverContainer)

			brandColors.forEach((color) => {
				brandColorsContainer.appendChild(this.generateColorButton(color))
				dialogStyle += `--${color.cssVariableName}: ${color.value};`
			})

			this.currentDialog.style += dialogStyle

			colorActionPopoverContent.push(brandColorsContainer)

			const colorActionButton = this.generateActionButton({
				button: this.generateIconButton({
					iconSvg: this.ehIcons.colors,
					classes: `${this.ehClasses.actionBarButton} ${this.ehClasses.colorsPopoverToggle}`,
				}),
				popover: this.generatePopover({
					popoverClasses: this.ehClasses.colorsPopover,
					popoverWrapperClasses: this.ehClasses.colorsPopoverWrapper,
					content: colorActionPopoverContent.reverse(),
				}),
			})

			return colorActionButton
		}

		/*
		 ** @param HTMLElement button
		 ** @param HTMLElement popover
		 ** @return HTMLElement
		 */
		generateActionButton(options = {}) {
			const buttonWrapper = document.createElement('div')
			buttonWrapper.className = this.ehClasses.actionsBarButtonWrapper

			buttonWrapper.appendChild(options?.button || this.generateIconButton())

			if (options.hasOwnProperty('popover')) {
				buttonWrapper.appendChild(options.popover)
			}

			return buttonWrapper
		}

		/*
		 ** @param String iconSvg
		 ** @param String classes
		 ** @param String style
		 ** @param Array attributes [ { name: 'data-testid', value: 'testid' } ]
		 ** @param String size   'default' | 'small' | 'x-small'
		 ** @return HTMLElement
		 */
		generateIconButton(options = {}) {
			const iconSize = options?.size === 'small' ? '14px' : '18px'
			const style = `${options?.style || ''}`
			const classes = `v-btn v-btn--icon v-btn--round theme--dark v-size--${options?.size || 'default'} ${
				options?.classes || ''
			}`
			const icon = `
                <span class="v-btn__content">
                    <div class="breakdance-icon" style="width: ${iconSize}; height: ${iconSize};">
                        ${options?.iconSvg}
                    </div>
                </span>
            `

			const button = document.createElement('button')
			button.className = classes
			button.setAttribute('type', 'button')
			button.setAttribute('style', style)

			if (options.hasOwnProperty('attributes')) {
				options.attributes.forEach((attribute) => {
					button.setAttribute(attribute?.name, attribute?.value)
				})
			}

			if (options.hasOwnProperty('iconSvg')) {
				button.innerHTML = icon
			}

			return button
		}

		generateColorButton(color) {
			return this.generateIconButton({
				classes: `${this.ehClasses.actionBarButton} ${this.ehClasses.popoverButton} ${this.ehClasses.colorsPopoverButton} `,
				style: `background: ${color.value?.value || color.value || 'var(--checkboard)'}; background-size: 20px 20px;`,
				attributes: [
					{
						name: 'eh-tooltip',
						value: color.label,
					},
					{
						name: 'eh-color-css-variable',
						value: `var(--${color.cssVariableName})`,
					},
				],
				size: 'x-small',
			})
		}

		/*
		 ** @param String popoverClasses
		 ** @param String popoverWrapperClasses
		 ** @param Array (HTMLElement) content
		 ** @return HTMLElement
		 */
		generatePopover(options = {}) {
			const popover = document.createElement('div')
			popover.className = `${this.ehClasses.popover} ${options?.popoverClasses || ''}`
			const wrapper = document.createElement('div')
			wrapper.className = `${this.ehClasses.popoverWrapper} ${options?.popoverWrapperClasses || ''}`

			options?.content?.forEach((el) => {
				wrapper.appendChild(el)
			})

			popover.appendChild(wrapper)

			return popover
		}

		initColorsActionsEvents() {
			const buttons = this.currentDialog.querySelectorAll(`.${this.ehClasses.colorsPopoverButton}`)

			buttons.forEach((button) => {
				button.addEventListener('click', (e) => {
					e.preventDefault()
					const cssVariable = e.target.getAttribute('eh-color-css-variable')
					const codeMirrorDoc = this.currentDialog.querySelector('.CodeMirror')?.CodeMirror?.getDoc()
					if (!codeMirrorDoc) return

					const { line, ch } = codeMirrorDoc.getCursor()
					codeMirrorDoc.replaceRange(cssVariable, { line, ch })

					/*
					 ** Nice to have but it's problematic when the new variable that's added is wrapped over several lines
					 ** I don't see any solution for now via the dom instance
					 ** Keeping it in case something changes in the future
					 */
					// const variableLength = cssVariable.length
					// const startCursor = codeMirrorDoc.getCursor()
					// const endCursor = codeMirrorDoc.getCursor(false)

					// console.log(startCursor.ch, endCursor.ch)

					// if (!codeMirrorDoc.somethingSelected()) {
					// 	console.log('no selection')
					// 	codeMirrorDoc.replaceRange(cssVariable, { line: startCursor.line, ch: startCursor.ch })
					// 	codeMirrorDoc.setSelection(
					// 		{ line: startCursor.line, ch: startCursor.ch },
					// 		{ line: startCursor.line, ch: startCursor.ch + variableLength }
					// 	)
					// 	return
					// }

					// if (startCursor.ch != endCursor.ch) {
					// 	console.log('selection ch not same')
					// 	codeMirrorDoc.replaceSelection(cssVariable)
					// 	codeMirrorDoc.setSelection(
					// 		{ line: startCursor.line, ch: startCursor.ch },
					// 		{ line: endCursor.line, ch: startCursor.ch + variableLength }
					// 	)
					// 	return
					// }

					// console.log('selection ch same')

					// const selection = codeMirrorDoc.getSelection()
					// console.log(startCursor.ch, endCursor.ch, selection.length)
					// // startCursor.ch -= selection.length

					// codeMirrorDoc.replaceRange(
					// 	cssVariable,
					// 	{ line: startCursor.line, ch: startCursor.ch - selection.length },
					// 	{ line: endCursor.line, ch: endCursor.ch }
					// )
					// codeMirrorDoc.setSelection(
					// 	{ line: startCursor.line, ch: startCursor.ch - selection.length },
					// 	{ line: endCursor.line, ch: startCursor.ch + variableLength }
					// )
				})
			})
		}

		initDockingActionsEvents() {
			const dockTopLeftButton = this.currentDialog.querySelector(`.${this.ehClasses.dockTopLeftButton}`)
			const dockTopRightButton = this.currentDialog.querySelector(`.${this.ehClasses.dockTopRightButton}`)
			const dockBottomLeftButton = this.currentDialog.querySelector(`.${this.ehClasses.dockBottomLeftButton}`)
			const dockBottomRightButton = this.currentDialog.querySelector(`.${this.ehClasses.dockBottomRightButton}`)

			dockTopLeftButton?.addEventListener('click', (e) => {
				e.preventDefault()
				Object.assign(this.currentDialog.style, {
					left: '-24px',
					top: '-24px',
					width: '40vw',
					height: '50vh',
				})
			})

			dockTopRightButton?.addEventListener('click', (e) => {
				e.preventDefault()
				Object.assign(this.currentDialog.style, {
					width: '40vw',
					height: '50vh',
				})

				requestAnimationFrame(() => {
					Object.assign(this.currentDialog.style, {
						left: `${window.parent.innerWidth - this.currentDialog.offsetWidth - 24}px`,
						top: '-24px',
					})
				})
			})

			dockBottomLeftButton?.addEventListener('click', (e) => {
				e.preventDefault()
				Object.assign(this.currentDialog.style, {
					width: '40vw',
					height: '50vh',
				})
				requestAnimationFrame(() => {
					Object.assign(this.currentDialog.style, {
						left: '-24px',
						top: `${window.parent.innerHeight - this.currentDialog.offsetHeight - 24}px`,
					})
				})
			})

			dockBottomRightButton?.addEventListener('click', (e) => {
				e.preventDefault()
				Object.assign(this.currentDialog.style, {
					width: '40vw',
					height: '50vh',
				})
				requestAnimationFrame(() => {
					Object.assign(this.currentDialog.style, {
						left: `${window.parent.innerWidth - this.currentDialog.offsetWidth - 24}px`,
						top: `${window.parent.innerHeight - this.currentDialog.offsetHeight - 24}px`,
					})
				})
			})
		}

		initOverlaySetup() {
			this.currentOverlay = this.app?.querySelector(`.${this.bdClasses.overlay}`)
			if (!this.currentOverlay) return

			const innerOverlay = this.currentOverlay.querySelector(`.${this.bdClasses.overlayScrim}`)
			if (!innerOverlay) return

			innerOverlay.style.backgroundColor = 'transparent'
		}

		initLineNumbers() {
			const codeMirror = this.currentDialog.querySelector(`.${this.bdClasses.codeMirror}`)?.CodeMirror

			codeMirror?.setOption('lineNumbers', true)

			const gutters = this.currentDialog.querySelector(`.${this.bdClasses.codeMirrorGutters}`)
			if (!gutters) return
			Object.assign(gutters.style, {
				width: '30px',
				display: 'block',
			})
		}

		initEvents() {
			const actionButtons = this.currentDialog.querySelectorAll(`.${this.ehClasses.actionBarButton}`)
			actionButtons.forEach((button) => {
				button.addEventListener('mouseenter', (e) => {
					this.canBeDragged = false
				})
				button.addEventListener('mouseover', (e) => {
					this.canBeDragged = false
				})
				button.addEventListener('mouseleave', (e) => {
					this.canBeDragged = true
				})
			})
		}

		injectCSS() {
			const style = document.createElement('style')
			style.type = 'text/css'
			style.id = 'eh-builder-tricks-css'

			const css = `
				/* Include the elements and selectors panels her for now */
				/* Elements Panel: Long elements names prettier */
				.breakdance-add-panel__element_wrapper .breakdance-add-panel__element-name {
					word-break: break-word;
					text-align: left;
				}

				.breakdance-add-panel__element_wrapper .breakdance-element-badge {
					word-break: normal;
				}

				/* Selectors Panel: Long selectors readable */
				.breakdance-manage-selectors .selectors-list-selectors .breakdance-repeater-item-title-text {
					white-space: normal;
				}

				/* Code Editor: Line Numbers */
				.v-dialog .CodeMirror-linenumber {
					color: #fc5900;
				}

				 .v-dialog .code-input .CodeMirror {
				 	padding: 0;
				 }

				/* Code Editor: draggable and docking */
				.v-dialog:has(>.code-input-dialog) {
					position: absolute;
				}

				.v-dialog .code-input-dialog-header:hover {
					cursor: grab;
				}

				.v-dialog__content .v-dialog:has(>.code-input-dialog) {
					transition: none;
				}


				/* Code Editor: Resizable */
				.v-dialog:has(>.code-input-dialog) {
					resize: both;
					min-height: 300px;
					min-width: 300px;
					max-width: 98vw !important;
					max-height: 98vh !important;

				}

				.v-dialog .code-input-dialog,
				.v-dialog .code-input,
				.v-dialog .code-input .breakdance-codemirror {
					height: 100%;
				}

				/* Code Editor: Header Action Bar */

				.v-dialog .code-input-dialog-header:has(>.eh-actions-bar) {
					--action-bar-gap: 8px;
					--action-popover-gap: 4px;
					--action-bar-radius: 6px;
					--checkboard: var(--gray100) url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400" fill-opacity=".25"><path d="M200 0h200v200H200zM0 200h200v200H0z"/></svg>');
					gap: var(--action-bar-gap);
				}

				 .v-dialog .code-input-dialog-header:has(>.eh-actions-bar) .code-input-dialog-close {
					margin-left: 0;
				}

				.v-dialog .code-input-dialog-header .eh-actions-bar {
					position: relative;
					display: flex;
					gap: var(--action-bar-gap);
					margin-left: auto;
				}

                .v-dialog .code-input-dialog-header .eh-actions-bar__btn-wrapper {
                    position: relative;
                }

                .v-dialog .code-input-dialog-header .eh-action-bar__btn {
					color: var(--white-fixed) !important;
					margin-left: auto;
					background-color: #444857;
					border-radius: var(--action-bar-radius);
					outline: none;
				}

                .v-dialog .code-input-dialog-header .eh-popover {
                    display: none;
					position: absolute;
                    top: 35px;
                    background: #444857;
					padding: 8px;
					border-radius: var(--action-bar-radius);
					z-index: 1;
                }

				.v-dialog .code-input-dialog-header .eh-popover__wrapper,
				.v-dialog .code-input-dialog-header .eh-popover__container {
                    display: grid;
                    grid-template-columns: repeat(1, 1fr);
                    gap: var(--action-popover-gap);
                }

				.v-dialog .code-input-dialog-header .eh-popover__container {
					grid-template-columns: repeat(5, 1fr);
				}

				.v-dialog .code-input-dialog-header .eh-popover__container:not(:last-child) {
					border-bottom: 1px solid #6a6a6a;
					padding-bottom: 5px;
				}

				.v-dialog .code-input-dialog-header .eh-docking-popover {
					left: -22px;
				}

				.v-dialog .code-input-dialog-header .eh-actions-bar:has(.eh-docking-popover-toggle:hover) .eh-docking-popover,
				.v-dialog .code-input-dialog-header .eh-actions-bar .eh-docking-popover:hover {
					display: block;
				}

				.v-dialog .code-input-dialog-header .eh-docking-popover__wrapper {
					grid-template-columns: repeat(2, 1fr);
				}

				.v-dialog .code-input-dialog-header .eh-popover__btn {
					position: relative;
					background-color: #313335;
					min-width: 0;
					min-height: 0;
				}

				.v-dialog .code-input-dialog-header .eh-popover__btn[eh-tooltip]::before {
					content: attr(eh-tooltip);
					position: absolute;
					display: none;
					background: #cbcbcb;
					color: black;
					opacity: 1;
					width: max-content;
					height: max-content;
					max-width: 120px;
					padding: 4px 8px;
					border-radius: 2px;
					z-index: 2;
					top: 100%;
					left: 50%;
					transform: translateX(-50%);
					font-size: 10px;
					word-wrap: break-word;
					white-space: normal;
				}

				.v-dialog .code-input-dialog-header .eh-popover__btn[eh-tooltip]:hover::before {
					display: block;
				}

				.v-dialog .code-input-dialog-header .eh-actions-bar:has(.eh-colors-popover-toggle:hover) .eh-colors-popover,
				.v-dialog .code-input-dialog-header .eh-actions-bar .eh-colors-popover:hover {
					display: block;
				}

				.v-dialog .code-input-dialog-header .eh-colors-popover {
					left: -60px;
				}




			`
			style.textContent = css
			window.parent.document.body.appendChild(style)
		}
	}

	new EhTricksCodeEditor()
})()
