from moviepy.editor import VideoFileClip
import sys

def compress_video(input_file, output_file, target_size_percentage):
    """
    Compresses an input video file to a target size.

    Args:
    input_file (str): Path to the input video file.
    output_file (str): Path where the compressed video will be saved.
    target_size_percentage (float): Target size as a percentage of the original size (0-100).
    """
    # Load the video file
    clip = VideoFileClip(input_file)
    
    # Calculate target bitrate based on the target size percentage
    # and the duration of the video
    target_bitrate = (clip.size[0] * clip.size[1] * clip.fps * target_size_percentage) / (100 * 1024)
    
    # Write the video file with the target bitrate
    clip.write_videofile(output_file, bitrate=f"{int(target_bitrate)}k")

if __name__ == "__main__":
    if len(sys.argv) != 4:
        print("Usage: python compress_video.py input.mp4 output.mp4 target_size_percentage")
        sys.exit(1)

    input_file = sys.argv[1]
    output_file = sys.argv[2]
    target_size_percentage = float(sys.argv[3])

    compress_video(input_file, output_file, target_size_percentage)
