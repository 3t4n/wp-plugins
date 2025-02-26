<?php

return [
	'type'         => [
		'label'  => __('Type','wpz-ai-image-lab' ),
		'values' => [
			'photo'          => [
				'label'        => __( 'Photo', 'wpz-ai-image-lab' ),
				'sample-image' => 'type-photo.jpg',
				'default'      => true
			],
			'painting'       => [
				'label'        => __('Painting', 'wpz-ai-image-lab' ),
				'sample-image' => 'type-painting.jpg'
			],
			'illustration'   => [
				'label'        => __('Illustration','wpz-ai-image-lab' ),
				'sample-image' => 'type-illustration.jpg'
			],
			'pencil-drawing' => [
				'label'        => __('Pencil Drawing','wpz-ai-image-lab' ),
				'sample-image' => 'type-pencil-drawing.jpg'
			],
			'digital-art'    => [
				'label'        => __('Digital Art','wpz-ai-image-lab' ),
				'sample-image' => 'type-digital-art.jpg'
			],
		],
	],
	'photo-lens'   => [
		'label'           => __('Camera Lens','wpz-ai-image-lab' ),
		'values'          => [
			'wide-angle' => [
				'label'        => __('Wide Angle','wpz-ai-image-lab' ),
				'sample-image' => 'lens-wide-angle.jpg',
			],
			'macro'      => [
				'label'        => __('Macro','wpz-ai-image-lab' ),
				'sample-image' => 'lens-macro.jpg'
			]
		],
		'showIfCondition' => 'type',
		'showIfValue'     => 'photo'
	],
	'photo-effect' => [
		'label'           => __('Photo Effect','wpz-ai-image-lab' ),
		'values'          => [
			'grayscale' => [
				'label'        => __('Grayscale','wpz-ai-image-lab' ),
				'sample-image' => 'effect-grayscale.jpg',
			],
		],
		'showIfCondition' => 'type',
		'showIfValue'     => 'photo'
	],

	'photo-lighting'       => [
		'label'           => __('Lighting','wpz-ai-image-lab' ),
		'values'          => [
			'other' => [
				'bioluminescent'      => __('Bioluminescent','wpz-ai-image-lab' ),
				'cinematic-lighting'  => __('Cinematic Lighting','wpz-ai-image-lab' ),
				'dark'                => __('Dark','wpz-ai-image-lab' ),
				'diffuse-lighting'    => __('Diffuse Lighting','wpz-ai-image-lab' ),
				'dramatic-lighting'   => __('Dramatic Lighting','wpz-ai-image-lab' ),
				'global-illumination' => __('Global Illumination','wpz-ai-image-lab' ),
				'glowing-lights'      => __('Glowing Lights','wpz-ai-image-lab' ),
				'god-rays'            => __('God Rays','wpz-ai-image-lab' ),
				'hard-shadows'        => __('Hard Shadows','wpz-ai-image-lab' ),
				'long-exposure'       => __('Long Exposure','wpz-ai-image-lab' ),
				'luminescence'        => __('Luminescence','wpz-ai-image-lab' ),
				'natural-lighting'    => __('Natural lighting','wpz-ai-image-lab' ),
				'neon'                => __('Neon','wpz-ai-image-lab' ),
				'radiant-light-rays'  => __('Radiant Light Rays','wpz-ai-image-lab' ),
				'rim-lighting'        => __('Rim Lighting','wpz-ai-image-lab' ),
				'soft-box-lighting'   => __('Soft Box Lighting','wpz-ai-image-lab' ),
				'studio-lighting'     => __('Studio Lighting','wpz-ai-image-lab' ),
				'sunlight'            => __('Sunlight','wpz-ai-image-lab' ),
				'translucent'         => __('Translucent','wpz-ai-image-lab' ),
				'volumetric-lighting' => __('Volumetric Lighting','wpz-ai-image-lab' ),
			]
		],
		'showIfCondition' => 'type',
		'showIfValue'     => 'photo',
		'class'           => 'wpz-form-row'
	],
	'painting-style'       => [
		'label'           => __('Painting Style','wpz-ai-image-lab' ),
		'values'          => [
			'impressionism' => [
				'label'        => __('Impressionism','wpz-ai-image-lab' ),
				'sample-image' => 'painting-impressionism.jpg',
			],
			'expressionism' => [
				'label'        => __('Expressionism','wpz-ai-image-lab' ),
				'sample-image' => 'painting-expressionism.jpg',
			],
			'abstract'      => [
				'label'        => __('Abstract','wpz-ai-image-lab' ),
				'sample-image' => 'painting-abstract.jpg',
			],
			'realistic'     => [
				'label'        => __('Realistic','wpz-ai-image-lab' ),
				'sample-image' => 'painting-realistic.jpg',
			],
		],
		'showIfCondition' => 'type',
		'showIfValue'     => 'painting'
	],
	'painting-medium'      => [
		'label'           => __('Painting Medium','wpz-ai-image-lab' ),
		'values'          => [
			'oil-on-canvas' => [
				'label'        => __('Oil on Canvas','wpz-ai-image-lab' ),
				'sample-image' => 'painting-oil-on-canvas.jpg'
			],
			'watercolor'    => [
				'label'        => __('Watercolor','wpz-ai-image-lab' ),
				'sample-image' => 'painting-watercolor.jpg',
			],
			'graffiti'      => [
				'label'        => __('Graffiti','wpz-ai-image-lab' ),
				'sample-image' => 'painting-graffiti.jpg',
			],
		],
		'showIfCondition' => 'type',
		'showIfValue'     => 'painting'
	],
	'illustration-style'   => [
		'label'           => __('Illustration Style','wpz-ai-image-lab' ),
		'values'          => [
			'comic-book'     => [
				'label'        => __('Comic Book','wpz-ai-image-lab' ),
				'sample-image' => 'illustration-comic-book.jpg',
			],
			'childrens-book' => [
				'label'        => __('Children\'s Book','wpz-ai-image-lab' ),
				'sample-image' => 'illustration-childrens-book.jpg',
			],
			'outline'        => [
				'label'        => __('Outline','wpz-ai-image-lab' ),
				'sample-image' => 'illustration-outline.jpg',
			],
		],
		'showIfCondition' => 'type',
		'showIfValue'     => 'illustration'
	],
	'pencil-drawing-style' => [
		'label'           => __('Pencil Drawing Style','wpz-ai-image-lab' ),
		'values'          => [
			'comic-book'    => [
				'label'        => __('Monochrome','wpz-ai-image-lab' ),
				'sample-image' => 'pencil-drawing-monochrome.jpg',
			],
			'pencil-crayon' => [
				'label'        => __('Pencil Crayon','wpz-ai-image-lab' ),
				'sample-image' => 'pencil-drawing-pencil-crayon.jpg',
			],
		],
		'showIfCondition' => 'type',
		'showIfValue'     => 'pencil-drawing'
	],
	'digital-art-style'    => [
		'label'           => __('Digital Art Style','wpz-ai-image-lab' ),
		'values'          => [
			'3d-render' => [
				'label'        => '3D Render',
				'sample-image' => 'digital-art-3d-render.jpg',
			],
			'8-bit'     => [
				'label'        => '8-Bit',
				'sample-image' => 'digital-art-8-bit.jpg',
			],
		],
		'showIfCondition' => 'type',
		'showIfValue'     => 'digital-art'
	],
	'3d-art-style'         => [
		'label'           => __('Advanced','ai-image-lab' ),
		'values'          => [
			'other' => [
				'dreamworks'  => __('Disney Style','ai-image-lab' ),
				'pixar'       => __('Pixar Style','ai-image-lab' ),
				'polygon-art' => __('Made with shapes and polygons', 'ai-image-lab' ),
			]
		],
		'showIfCondition' => 'type',
		'showIfValue'     => 'digital-art',
		'class'           => 'wpz-form-row'
	],
	'artist'               => [
		'label'  => __('Artist','ai-image-lab' ),
		'values' => [
			'other' => [
				'Brad-Rigney'         => __('Brad Rigney - Dark, surreal fantasy landscapes','ai-image-lab' ),
				'David-Cronenberg'    => __('David Cronenberg - Realistic, cinematic character design','ai-image-lab' ),
				'Dave-Rapoza'         => __('Dave Rapoza - Body horror, sci-fi surrealism','ai-image-lab' ),
				'Edwin-Deakin'        => __('Edwin Deakin - Luminous, atmospheric California landscape','ai-image-lab' ),
				'Frida-Kahlo'         => __('Frida Kahlo - Intensely personal, surreal self-portraiture','ai-image-lab' ),
				'Greg-Rutkowski'      => __('Greg Rutkowski - Moody, ethereal fantasy environments','ai-image-lab' ),
				'Henry-Asencio'       => __('Henry Asencio - Dynamic, textured figurative painting','ai-image-lab' ),
				'Huang-Guangjian'     => __('Huang Guangjian - Colorful, playful pop art characters','ai-image-lab' ),
				'Ilya-Kuvshinov'      => __('Ilya Kuvshinov - Dreamy, anime-inspired digital portraits','ai-image-lab' ),
				'Jackson-Pollock'     => __('Jackson Pollock - Abstract expressionist drip painting','ai-image-lab' ),
				'JB-Monge'            => __('JB Monge - Whimsical, detailed fantasy creature design','ai-image-lab' ),
				'John-Collier'        => __('John Collier - Realistic, haunting figurative painting','ai-image-lab' ),
				'John-Singer-Sargent' => __('John Singer Sargent - Elegant, impressionistic portrait painting','ai-image-lab' ),
				'Josephine-Wall'      => __('Josephine Wall - Mystical, romantic fantasy illustration','ai-image-lab' ),
				'Kilian-Eng'          => __('Kilian Eng - Retro-futuristic sci-fi digital art','ai-image-lab' ),
				'Kim-Jung-Gi'         => __('Kim Jung Gi - Hyper-detailed, surreal pen and ink drawings','ai-image-lab' ),
				'Krenz-Cushart'       => __('Krenz Cushart - Cute, whimsical character design','ai-image-lab' ),
				'Milo-Manara'         => __('Milo Manara - Sensual, erotic comic book art','ai-image-lab' ),
				'Mort-Kunstler'       => __('Mort Kunstler - Historical, narrative figurative painting','ai-image-lab' ),
				'Otto-Dix'            => __('Otto Dix - Expressionist, socially critical figurative painting','ai-image-lab' ),
				'Pablo-Picasso'       => __('Pablo Picasso - Inventive, groundbreaking modern art','ai-image-lab' ),
				'Ross-Tran'           => __('Ross Tran - Loose, expressive digital character sketches','ai-image-lab' ),
				'russ-mills'          => __('Russ Mills - Collage-like mixed media portrait art','ai-image-lab' ),
				'Salvador-Dali'       => __('Salvador Dali - Surrealist, dreamlike imagery','ai-image-lab' ),
				'Stanley-Artgerm-Lau' => __('Stanley Artgerm Lau - Gorgeous, glamorous comic book covers','ai-image-lab' ),
				'Takashi-Murakami'    => __('Takashi Murakami - Colorful, playful pop art sculpture','ai-image-lab' ),
				'Tooth-Wu'            => __('Tooth Wu - Dynamic, stylized character illustration','ai-image-lab' ),
				'Vincent-van-Gogh '   => __('Vincent van Gogh - Vibrant, emotional post-impressionist painting','ai-image-lab' ),
				'Yoshitaka-Amano'     => __('Yoshitaka Amano - Elaborate, ornate fantasy illustration','ai-image-lab' ),
				'Zdzisław-Beksiński'  => __('Zdzisław Beksiński -Dark, surreal gothic painting','ai-image-lab' ),
			]
		],
		'class'  => 'wpz-form-row'
	],
	'website'              => [
		'label'  => __('Website','ai-image-lab' ),
		'values' => [
			'other' => [
				'ArtStation' => __('ArtStation - Digital concept art and 3D modeling','ai-image-lab' ),
				'Behance'    => __('Behance - Graphic design, branding, and typography','ai-image-lab' ),
				'CGSociety'  => __('DCGSociety - igital animation and visual effects','ai-image-lab' ),
				'DeviantArt' => __('DeviantArt - Fan art, anime/manga, and surrealism','ai-image-lab' ),
				'Dribbble'   => __('Dribbble - UI/UX design and illustration','ai-image-lab' ),
				'iStock'     => __('iStock - Stock photography and vector illustrations','ai-image-lab' ),
				'Pixabay'    => __('Pixabay - Wide range of stock photos and videos','ai-image-lab' ),
				'Pixiv'      => __('Pixiv - Anime and manga fan art, illustrations','ai-image-lab' ),
				'Zerochan'   => __('Zerochan - Anime and manga fan art, illustrations','ai-image-lab' ),
			]
		],
		'class'  => 'wpz-form-row'
	],
	'color'                => [
		'label'  => __('Color','ai-image-lab' ),
		'values' => [
			'other' => [
				'aesthetic'          => __('Aesthetic','ai-image-lab' ),
				'colorful'           => __('Colorful','ai-image-lab' ),
				'color-grading'      => __('Color Grading','ai-image-lab' ),
				'ektachrome'         => __('Ektachrome','ai-image-lab' ),
				'enamelled'          => __('Enamelled','ai-image-lab' ),
				'iridescent-accents' => __('Iridescent Accents','ai-image-lab' ),
				'iridescent-gold'    => __('Iridescent Gold','ai-image-lab' ),
				'muted-colors'       => __('Muted Colors','ai-image-lab' ),
				'neon'               => __('Neon','ai-image-lab' ),
				'silver'             => __('Silver','ai-image-lab' ),
				'tone-mapping'       => __('Tone Mapping','ai-image-lab' ),
				'vibrant-color'      => __('Vibrant Color','ai-image-lab' ),
				'vintage'            => __('Vintage','ai-image-lab' ),
				'vivid'              => __('Vivid','ai-image-lab' ),
			]
		],
		'class'  => 'wpz-form-row'
	],
];