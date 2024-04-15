import subprocess
import sys

def compress_video_ffmpeg(input_file, output_file, crf_value=23):
    """
    Compress a video file using FFmpeg with a specified CRF value.

    Args:
    input_file (str): Path to the input video file.
    output_file (str): Path where the compressed video will be saved.
    crf_value (int): Constant Rate Factor (CRF) value (default: 23).
                     Lower values mean better quality but larger file sizes.
                     The range is 0 (lossless) to 51 (worst quality).
    """
    command = [
        'ffmpeg',
        '-i', input_file,
        '-vcodec', 'libx264',
        '-crf', str(crf_value),
        '-preset', 'slow',
        output_file
    ]
    subprocess.run(command)

if __name__ == "__main__":
    if len(sys.argv) != 4:
        print("Usage: python compress_video_ffmpeg.py input.mp4 output.mp4 crf_value")
        sys.exit(1)

    input_file = sys.argv[1]
    output_file = sys.argv[2]
    crf_value = int(sys.argv[3])

    compress_video_ffmpeg(input_file, output_file, crf_value)
