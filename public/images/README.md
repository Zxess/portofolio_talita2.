# Portfolio Images

This folder contains all images used throughout the portfolio website. Place your images here with the following naming convention:

## Album Images (Featured Albums Section)
- `album-travel.jpg` - Travel album cover image
- `album-coffee.jpg` - Coffee album cover image
- `album-workspace.jpg` - Workspace album cover image
- `album-events.jpg` - Events album cover image

**Recommended size:** 500x400px (16:10 aspect ratio)
**Format:** JPG or PNG

## Achievement Images (6 Achievement Cards)
- `achievement-award.jpg` - Best Developer Award
- `achievement-projects.jpg` - 100+ Projects Completed
- `achievement-certified.jpg` - Certified Developer
- `achievement-featured.jpg` - Featured in Tech News
- `achievement-community.jpg` - Community Leader
- `achievement-opensource.jpg` - Open Source Contributor

**Recommended size:** 500x600px (portrait orientation)
**Format:** JPG or PNG

## Video Carousel Images (4 Video Slides)
- `video-tutorial.jpg` - Web Development Tutorial thumbnail
- `video-coding.jpg` - Coding Live Session thumbnail
- `video-design.jpg` - UI/UX Design thumbnail
- `video-project.jpg` - Project Showcase thumbnail

**Recommended size:** 1200x675px (16:9 aspect ratio)
**Format:** JPG or PNG

## How to Add Images

1. Prepare your images with the recommended sizes for best results
2. Name them exactly as shown above
3. Place them in this `public/images` folder
4. The images will automatically be served from `{{ asset('images/filename.jpg') }}`

## Alternative: Using External URLs

If you prefer to use Unsplash or other external images, you can temporarily use them by directly pasting the URL in the asset() helper. However, for production, it's recommended to use local copies for better performance and reliability.
